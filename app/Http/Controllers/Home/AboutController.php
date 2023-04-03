<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\MultiImage;
use App\Models\Service;
use Carbon\Carbon;
use Image;



class AboutController extends Controller
{
    //
    public function AboutPage(){
        $aboutpage = About::find(1);

        return view('admin.about_page.about_page_all', compact('aboutpage'));
    } //end Method
    

    public function UpdateAbout(Request $request){
        $about_id = $request->id;

        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
            
            Image::make($image)->resize(532,605)->save('upload/home_about/'.$name_gen);
            $save_url = 'upload/home_about/'. $name_gen;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Updated Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }else {
            About::findorFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description, 
            ]);

            $notification = array(
                'message' => 'Updated Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }//end Method


    public function HomeAbout(){
        $aboutpage = About::find(1);
        $all_multi_image = MultiImage::all();
        $service = Service::latest()->get();
        return view('frontend.about_page', compact('aboutpage', 'all_multi_image', 'service'));
    }//end Method


    public function AboutMultiImage(){
        return view('admin.about_page.multi_image');
    }//end Method


    public function StoreMultiImage(Request $request){
        $image = $request->file('multi_image');

        foreach ($image as $multi_image) {
            $name_gen = hexdec(uniqid()). '.' . $multi_image->getClientOriginalExtension();
            
            Image::make($multi_image)->resize(220,220)->save('upload/multi/'.$name_gen);
            $save_url = 'upload/multi/'. $name_gen;

            MultiImage::insert([
             
                'multi_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
        }
            $notification = array(
                'message' => 'Images Inserted Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.multi.image')->with($notification);
    
    }//end Method


    public function AllMultiImage(){
        $all_multi_image = MultiImage::all();
        return view('admin.about_page.all_multi_image', compact('all_multi_image'));
    }//end Method


    public function EditMultiImage($id){
        $allimages = MultiImage::findOrFail($id);

        return view('admin.about_page.edit_multi_image', compact('allimages'));

    }//end Method


    public function UpdateMultiImage(Request $request){
        $multi_image_id = $request->id;

        if ($request->file('multi_image')) {
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
            
            Image::make($image)->resize(220,220)->save('upload/multi/'.$name_gen);
            $save_url = 'upload/multi/'. $name_gen;

            MultiImage::findOrFail($multi_image_id)->update([
                
                'multi_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Updated Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.multi.image')->with($notification);
        }
    }//end Method


    public function DeleteMultiImage($id){
        $image = MultiImage::findOrFail($id);
        $img = $image->multi_image;
        unlink($img);

        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);


    }//end Method
}
