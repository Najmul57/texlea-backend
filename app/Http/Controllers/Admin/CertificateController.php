<?php

namespace App\Http\Controllers\Admin;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use App\Http\Controllers\Controller;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::latest()->get();
        return view('backend.certificate.index', compact('certificates'));
    } // end method

    public function create()
    {
        return view('backend.certificate.create');
    } // end method

    public function store(Request $request)
    {

        $data = new Certificate();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/certificate'), $filename);
            Image::make(public_path('uploads/certificate') . '/' . $filename)->resize(565, 200)->save('uploads/certificate/' . $filename);
            $data->image = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Certificate Store Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('certificate.index')->with($notification);
    } // end method

    public function edit($id)
    {
        $data = Certificate::findOrFail($id);
        return view('backend.certificate.edit', compact('data'));
    } // end method

    public function update(Request $request, $id)
    {
        $data = Certificate::findOrFail($id);


        if ($request->hasFile('image')) {
            if ($data->image) {
                unlink(public_path('uploads/certificate') . '/' . $data->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/certificate'), $filename);
            Image::make(public_path('uploads/certificate') . '/' . $filename)->resize(565, 200)->save('uploads/certificate/' . $filename);
            $data->image = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Certificate Update Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('certificate.index')->with($notification);
    } // end method


    public function destroy($id)
    {
        $data = Certificate::findOrFail($id);

        if ($data->image) {
            unlink(public_path('uploads/certificate') . '/' . $data->image);
        }

        $data->delete();

        $notification = array(
            'message' => 'Certificate Delete Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // end method
}
