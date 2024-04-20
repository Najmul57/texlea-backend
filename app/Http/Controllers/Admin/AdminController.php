<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;

class AdminController extends Controller
{
    public function admin()
    {
        return view('backend.layout.admin-master');
    } // end method

    public function contactmessage()
    {
        $data = ContactForm::latest()->get();
        return view('backend.contact.index', compact('data'));
    } // end method

    public function destroy($id)
    {
        $data = ContactForm::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Contact Message Delete Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
