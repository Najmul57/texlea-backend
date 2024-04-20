<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Intervention\Image\Image;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::latest()->get();
        return view('backend.country.index', compact('countries'));
    } // end method

    public function create()
    {
        return view('backend.country.create');
    } // end method

    public function store(Request $request)
    {
        $request->validate([
            'list' => 'required'
        ]);

        $data = new Country();
        $data->name = $request->input('name');
        $data->list = $request->input('list');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/country'), $filename);
            Image::make(public_path('uploads/country') . '/' . $filename)->resize(420, 260)->save('uploads/country/' . $filename);
            $data->image = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Country Store Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('country.index')->with($notification);
    } // end method

    public function edit($id)
    {
        $data = Country::findOrFail($id);
        return view('backend.country.edit', compact('data'));
    } // end method

    public function update(Request $request, $id)
    {
        $request->validate([
            'list' => 'required'
        ]);
        
        $data = Country::findOrFail($id);
        $data->name = $request->input('name');
        $data->list = $request->input('list');

        if ($request->hasFile('image')) {
            if ($data->image) {
                unlink(public_path('uploads/country') . '/' . $data->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/country'), $filename);
            Image::make(public_path('uploads/country') . '/' . $filename)->resize(420, 260)->save('uploads/country/' . $filename);
            $data->image = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Country Update Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('country.index')->with($notification);
    } // end method


    public function destroy($id)
    {
        $data = Country::findOrFail($id);

        if ($data->image) {
            unlink(public_path('uploads/country') . '/' . $data->image);
        }

        $data->delete();

        $notification = array(
            'message' => 'Country Delete Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // end method
}
