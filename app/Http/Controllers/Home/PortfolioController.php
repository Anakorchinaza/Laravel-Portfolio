<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Carbon\Carbon;
Use Image;

class PortfolioController extends Controller
{
    //

    public function AllPorfolio(){
        $all_portfolio = Portfolio::latest()->get();

        return view('admin.portfolio.all_portfolio', compact('all_portfolio'));
    }//End Method


    public function AddPorfolio(){
        return view('admin.portfolio.add_portfolio');
    }//End Method


    public function InsertPorfolio(Request $request){
        $request ->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ], [
            'name.required' => 'Portfolio Name is Required',
            'title.required' => 'Portfolio Title is Required',
            'description.required' => 'Portfolio Description is Required',
            'image.required' => 'Portfolio Image is Required',
        ]);

        $image = $request->file('image');
            $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
            
            Image::make($image)->resize(1020,519)->save('upload/portfolio/'.$name_gen);
            $save_url = 'upload/portfolio/'. $name_gen;

            Portfolio::insert([
                'portfolio_name' => $request->name,
                'portfolio_title' => $request->title,
                'portfolio_description' => $request->description,
                'portfolio_image' => $save_url,
                'created_at' => Carbon::now(),
                
            ]);

            $notification = array(
                'message' => 'Portfolio Added Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.portfolio')->with($notification);

    }//End Method



    public function EditPorfolio($id){
        $editportfolio = Portfolio::findOrFail($id);

        return view('admin.portfolio.edit_portfolio', compact('editportfolio'));
    }//End Method


    public function UpdatePorfolio(Request $request){
        $portfolio_id = $request->id;

        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
            
            Image::make($image)->resize(1020,519)->save('upload/portfolio/'.$name_gen);
            $save_url = 'upload/portfolio/'. $name_gen;

            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->name,
                'portfolio_title' => $request->title,
                'portfolio_description' => $request->description,
                'portfolio_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Portfolio Updated Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.portfolio')->with($notification);
        }else {
            Portfolio::findorFail($portfolio_id)->update([
                'portfolio_name' => $request->name,
                'portfolio_title' => $request->title,
                'portfolio_description' => $request->description,
            ]);

            $notification = array(
                'message' => 'Portfolio Updated Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.portfolio')->with($notification);
        }
    }//End Method



    public function DeletePorfolio($id){
        $portfolio_id = Portfolio::findOrFail($id);
        $img = $portfolio_id->portfolio_image;
        unlink($img);

        Portfolio::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Portfolio Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.portfolio')->with($notification);
    }//End Method


    public function PorfolioDetails($id){
        $portfolio = Portfolio::findOrFail($id);

        return view('frontend.portfolio_details', compact('portfolio'));
    }//End Method


    public function HomePorfolio(){

        $portfolio = Portfolio::latest()->get();
        return view('frontend.portfolio', compact('portfolio'));
    } //End Method



}
