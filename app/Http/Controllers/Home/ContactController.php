<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Contact;

class ContactController extends Controller
{
    public function Contact(){
        return view('frontend.contact');
    }// End Method


    public function StoreContact(Request $request){
        $request ->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ], [
            'name.required' => '    Name Field is Required',
            'email.required' => 'Email Address Field is Required',
            'subject.required' => 'Subject Field is Required',
            'phone.required' => 'Phone Number Field is Required',
            'message.required' => 'Message Field is Required',
        ]);

        Contact::insert([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'phone' => $request->phone,
                'message' => $request->message,
                'created_at' => Carbon::now(),
                
            ]);

            $notification = array(
                'message' => 'Sent Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
    }// End Method


    public function ContactMessage(){
        $all_message = Contact::latest()->get();
        return view('admin.contact.all_contact', compact('all_message'));
    }// End Method


    public function DeleteMessage($id){

        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Message Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }// End Method
}
