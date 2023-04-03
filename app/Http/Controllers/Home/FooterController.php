<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Footer;

class FooterController extends Controller
{
    public function AllFooter(){
        $footer = Footer::find(1);
        return view('admin.footer.allfooter', compact('footer'));
    } // End Method


    public function UpdateFooter(Request $request){
        $footer_id = $request->id;

        Footer::findorFail($footer_id)->update([
            'number' => $request->number,
            'short_description' => $request->short_description,
            'address' => $request->address,
            'email' => $request->email, 
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'copyright' => $request->copyright,
        ]);

        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
      
    } // End Method




}
