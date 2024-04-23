<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Image;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::latest()->get();
        return view('backend.feature.index', compact('features'));
    } // end method

    public function create()
    {
        return view('backend.feature.create');
    } // end method

    public function store(Request $request)
    {

        $data = new Feature();
        $data->name = $request->input('name');
        $data->count = $request->input('count');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/feature'), $filename);
            Image::make(public_path('uploads/feature') . '/' . $filename)->resize(64, 64)->save('uploads/feature/' . $filename);
            $data->image = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Feature Store Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('feature.index')->with($notification);
    } // end method

    public function edit($id)
    {
        $data = Feature::findOrFail($id);
        return view('backend.feature.edit', compact('data'));
    } // end method

    public function update(Request $request, $id)
    {
        $data = Feature::findOrFail($id);

        $data->name = $request->input('name');
        $data->count = $request->input('count');

        if ($request->hasFile('image')) {

            if ($data->image && file_exists(public_path('uploads/feature') . '/' . $data->image)) {
                unlink(public_path('uploads/feature') . '/' . $data->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/feature'), $filename);
            Image::make(public_path('uploads/feature') . '/' . $filename)->resize(64, 64)->save('uploads/feature/' . $filename);
            $data->image = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Feature Update Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('feature.index')->with($notification);
    } // end method


    public function destroy($id)
    {
        $data = Feature::findOrFail($id);

        if ($data->image && file_exists(public_path('uploads/feature') . '/' . $data->image)) {
            unlink(public_path('uploads/feature') . '/' . $data->image);
        }

        $data->delete();

        $notification = array(
            'message' => 'Feature Delete Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // end method
}
