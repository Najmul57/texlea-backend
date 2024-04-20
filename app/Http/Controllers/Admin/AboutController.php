<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function about()
    {
        $abouts = About::first();
        return view('backend.about.create', compact('abouts',));
    } // end method

    public function update(Request $request, $id)
    {
        $data = About::findOrFail($id);
        $data->short_about = $request->input('short_about');
        $data->long_about = $request->input('long_about');
        $data->mission = $request->input('mission');
        $data->vission = $request->input('vission');
        $data->quality = $request->input('quality');
        $data->service = $request->input('service');

        //about image
        if ($request->hasFile('about_image')) {
            $file = $request->file('about_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/about'), $filename);
            Image::make(public_path('uploads/about') . '/' . $filename)->resize(885, 590)->save('uploads/about/' . $filename);
            // Delete old image if exists
            if ($data->about_image) {
                unlink(public_path('uploads/about') . '/' . $data->about_image);
            }
            $data->about_image = $filename;
        }
        //mission image
        if ($request->hasFile('mission_image')) {
            $file = $request->file('mission_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/about'), $filename);
            Image::make(public_path('uploads/about') . '/' . $filename)->resize(885, 590)->save('uploads/about/' . $filename);
            // Delete old image if exists
            if ($data->mission_image) {
                unlink(public_path('uploads/about') . '/' . $data->mission_image);
            }
            $data->mission_image = $filename;
        }
        //vission image
        if ($request->hasFile('vission_image')) {
            $file = $request->file('vission_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/about'), $filename);
            Image::make(public_path('uploads/about') . '/' . $filename)->resize(885, 590)->save('uploads/about/' . $filename);
            // Delete old image if exists
            if ($data->vission_image) {
                unlink(public_path('uploads/about') . '/' . $data->vission_image);
            }
            $data->vission_image = $filename;
        }
        //quality image
        if ($request->hasFile('quality_image')) {
            $file = $request->file('quality_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/about'), $filename);
            Image::make(public_path('uploads/about') . '/' . $filename)->resize(885, 590)->save('uploads/about/' . $filename);
            // Delete old image if exists
            if ($data->quality_image) {
                unlink(public_path('uploads/about') . '/' . $data->quality_image);
            }
            $data->quality_image = $filename;
        }
        //service image
        if ($request->hasFile('service_image')) {
            $file = $request->file('service_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/about'), $filename);
            Image::make(public_path('uploads/about') . '/' . $filename)->resize(885, 590)->save('uploads/about/' . $filename);
            // Delete old image if exists
            if ($data->service_image) {
                unlink(public_path('uploads/about') . '/' . $data->service_image);
            }
            $data->service_image = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'About Update Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
