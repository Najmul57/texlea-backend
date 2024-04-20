<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function formsubmit(Request $request){
        
        $data = new ContactForm();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');

        $data->save();

        $notification = array(
            'message' => 'Thank you for Contact US!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
}
