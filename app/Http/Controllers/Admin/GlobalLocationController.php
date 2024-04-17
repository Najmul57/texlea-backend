<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GlobalLocation;
use Illuminate\Http\Request;

class GlobalLocationController extends Controller
{
    public function index()
    {
        $locations = GlobalLocation::latest()->get();
        return view('backend.global_location.index', compact('locations'));
    } // end method

    public function create()
    {
        return view('backend.global_location.create');
    } // end method

    public function store(Request $request)
    {

        $data = new GlobalLocation();
        $data->name = $request->input('name');
        $data->feature = $request->input('feature');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/location'), $filename);
            $data->image = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Global Location Store Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('global_location.index')->with($notification);
    } // end method

    public function edit($id)
    {
        $data = GlobalLocation::findOrFail($id);
        return view('backend.global_location.edit', compact('data'));
    } // end method

    public function update(Request $request, $id)
    {
        $data = GlobalLocation::findOrFail($id);
        $data->name = $request->input('name');
        $data->feature = $request->input('feature');


        if ($request->hasFile('image')) {
            if ($data->image) {
                unlink(public_path('uploads/location') . '/' . $data->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/location'), $filename);
            $data->image = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Global Location Update Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('global_location.index')->with($notification);
    } // end method


    public function destroy($id)
    {
        $data = GlobalLocation::findOrFail($id);

        if ($data->image) {
            unlink(public_path('uploads/location') . '/' . $data->image);
        }

        $data->delete();

        $notification = array(
            'message' => 'Global Location Delete Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // end method
}
