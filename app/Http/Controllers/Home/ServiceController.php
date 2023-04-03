<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Carbon\Carbon;
Use Image;

class ServiceController extends Controller
{
    public function AddService(){
        return view('admin.service.add_service');
    } // End Method

    public function InsertService(Request $request){
        $request ->validate([
            'title' => 'required',
            'short_description' => 'required',
            'body' => 'required',
            'image' => 'required',
            'icon' => 'required',
        ], [
            'title.required' => 'Service Title is Required',
            'short_description.required' => 'Short Description is Required',
            'body.required' => 'Long Description is Required',
            'image.required' => 'Service Image is Required',
            'icon.required' => 'Service Icon is Required',
        ]);

        $image = $request->file('image');
            $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
            
            Image::make($image)->resize(323,240)->save('upload/service/'.$name_gen);
            $save_url = 'upload/service/'. $name_gen;

        $image2 = $request->file('icon');
            $name_genn = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
            
            Image::make($image2)->resize(83,90)->save('upload/icon/'.$name_genn);
            $save_url2 = 'upload/icon/'. $name_genn;

            Service::insert([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'body' => $request->body,
                'image' => $save_url,
                'icon' => $save_url2,
                'created_at' => Carbon::now(),
                
            ]);

            $notification = array(
                'message' => 'Service Added Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.service')->with($notification);
    }// End Method


    public function AllService(){
        $all_service = Service::latest()->get();
        return view('admin.service.all_service', compact('all_service'));
    }//End Method


    public function EditService($id){
        $editservice = Service::findOrFail($id);
        return view('admin.service.edit_service', compact('editservice'));
    }// End Method


    public function UpdateService(Request $request){
        $service_id = $request->id;
        // @unlink(public_path('upload/service/'.$service_id->image));
        if ($request->file('image')) { 
            $image = $request->file('image');
            
            $name_gen = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();   
            Image::make($image)->resize(323,240)->save('upload/service/'.$name_gen);
            $save_url = 'upload/service/'. $name_gen;

            Service::findOrFail($service_id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'body' => $request->body,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Service Updated Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.service')->with($notification);

        } elseif ($request->file('icon')) {
            $icon = $request->file('icon');

            $name_genn = hexdec(uniqid()). '.' . $icon->getClientOriginalExtension();   
            Image::make($icon)->resize(83,90)->save('upload/icon/'.$name_genn);
            $save_urll = 'upload/icon/'. $name_genn;
            
            Service::findOrFail($service_id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'body' => $request->body,
                'icon' => $save_urll
            ]);

            $notification = array(
                'message' => 'Service Updated Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.service')->with($notification);

        } else {
            Service::findorFail($service_id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'body' => $request->body,
            ]);

            $notification = array(
                'message' => 'Service Updated Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.service')->with($notification);
        }
            
            
        
    }//End Method

    public function DeleteService($id){
        $serviceid = Service::findOrFail($id);
        $img = $serviceid->image;
        unlink($img);

        Service::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Service Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.service')->with($notification);
    }//End Method


    public function ServiceDetails($id){

        $service = Service::findOrFail($id);
        return view('frontend.service_details', compact('service'));
    }// End Method

    public function HomeService(){
        $service = Service::latest()->get();
        return view('frontend.service', compact('service'));
    }// End Method




}
