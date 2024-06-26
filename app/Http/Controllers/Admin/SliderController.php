<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('backend.slider.index', compact('sliders'));
    } // end method

    public function create()
    {
        return view('backend.slider.create');
    } // end method

    public function store(Request $request)
    {

        $data = new Slider();
        $data->title = $request->input('title');

        if ($request->hasFile('slide')) {
            $file = $request->file('slide');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/slider'), $filename);
            Image::make(public_path('uploads/slider') . '/' . $filename)->resize(2100, 800)->save('uploads/slider/' . $filename);
            $data->slide = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Slider Insert Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('slider.index')->with($notification);
    } // end method

    public function edit($id)
    {
        $data = Slider::findOrFail($id);
        return view('backend.slider.edit', compact('data'));
    } // end method

    public function update(Request $request, $id)
    {
        $data = Slider::findOrFail($id);

        $data->title = $request->input('title');

        if ($request->hasFile('slide')) {
            if ($data->slide && file_exists(public_path('uploads/slider') . '/' . $data->slide)) {
                unlink(public_path('uploads/slider') . '/' . $data->slide);
            }

            $file = $request->file('slide');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/slider'), $filename);
            Image::make(public_path('uploads/slider') . '/' . $filename)->resize(2100, 800)->save('uploads/slider/' . $filename);
            $data->slide = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Slider Update Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('slider.index')->with($notification);
    }


    public function destroy($id)
    {
        $data = Slider::findOrFail($id);

        if ($data->slide && file_exists(public_path('uploads/slider') . '/' . $data->slide)) {
            unlink(public_path('uploads/slider') . '/' . $data->slide);
        }

        $data->delete();

        $notification = array(
            'message' => 'Slider Delete Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
