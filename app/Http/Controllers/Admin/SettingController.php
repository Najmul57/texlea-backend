<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Image;


class SettingController extends Controller
{
    public function setting()
    {
        $settings = Setting::first();
        return view('backend.setting.create', compact('settings',));
    } // end method

    public function update(Request $request, $id)
    {
        $data = Setting::findOrFail($id);
        $data->phone = $request->input('phone');
        $data->email = $request->input('email');
        $data->about = $request->input('about');
        $data->facebook = $request->input('facebook');
        $data->linkedin = $request->input('linkedin');
        $data->instagram = $request->input('instagram');
        $data->twitter = $request->input('twitter');
        $data->dhaka_office = $request->input('dhaka_office');
        $data->italy_office = $request->input('italy_office');
        $data->duration = $request->input('duration');

        //logo
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/setting'), $filename);
            Image::make(public_path('uploads/setting') . '/' . $filename)->resize(175, 57)->save('uploads/setting/' . $filename);

            if ($data->logo && file_exists(public_path('uploads/setting') . '/' . $data->logo)) {
                unlink(public_path('uploads/setting') . '/' . $data->logo);
            }


            $data->logo = $filename;
        }
        //offcanvas_logo
        if ($request->hasFile('offcanvas_logo')) {
            $file = $request->file('offcanvas_logo');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/setting'), $filename);

            Image::make(public_path('uploads/setting') . '/' . $filename)->resize(175, 57)->save('uploads/setting/' . $filename);
            if ($data->offcanvas_logo && file_exists(public_path('uploads/setting') . '/' . $data->offcanvas_logo)) {
                unlink(public_path('uploads/setting') . '/' . $data->offcanvas_logo);
            }


            $data->offcanvas_logo = $filename;
        }


        $data->save();

        $notification = array(
            'message' => 'Setting Update Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
