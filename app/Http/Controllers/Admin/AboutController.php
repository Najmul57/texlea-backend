<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::latest()->get();
        return view('backend.about.index', compact('about'));
    } // end method

    public function create()
    {
        return view('backend.about.create');
    } // end method

    // public function store(Request $request)
    // {

    //     $data = new Feature();
    //     $data->name = $request->input('name');
    //     $data->count = $request->input('count');

    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image');
    //         $filename = time() . '_' . $file->getClientOriginalName();
    //         $file->move(public_path('uploads/feature'), $filename);
    //         $data->image = $filename;
    //     }

    //     $data->save();

    //     $notification = array(
    //         'message' => 'Feature Store Success!',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->route('feature.index')->with($notification);
    // } // end method

    // public function edit($id)
    // {
    //     $data = Feature::findOrFail($id);
    //     return view('backend.feature.edit', compact('data'));
    // } // end method

    // public function update(Request $request, $id)
    // {
    //     $data = Feature::findOrFail($id);

    //     $data->name = $request->input('name');
    //     $data->count = $request->input('count');

    //     if ($request->hasFile('image')) {
    //         if ($data->image) {
    //             unlink(public_path('uploads/feature') . '/' . $data->image);
    //         }

    //         $file = $request->file('image');
    //         $filename = time() . '_' . $file->getClientOriginalName();
    //         $file->move(public_path('uploads/feature'), $filename);
    //         $data->image = $filename;
    //     }

    //     $data->save();

    //     $notification = array(
    //         'message' => 'Feature Update Success!',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->route('feature.index')->with($notification);
    // } // end method


    // public function destroy($id)
    // {
    //     $data = Feature::findOrFail($id);

    //     if ($data->image) {
    //         unlink(public_path('uploads/feature') . '/' . $data->image);
    //     }

    //     $data->delete();

    //     $notification = array(
    //         'message' => 'Feature Delete Success!',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->back()->with($notification);
    // } // end method
}
