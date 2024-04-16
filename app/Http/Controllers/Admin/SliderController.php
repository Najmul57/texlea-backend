<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

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
            if ($data->slide) {
                unlink(public_path('uploads/slider') . '/' . $data->slide);
            }

            $file = $request->file('slide');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/slider'), $filename);
            $data->slide = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Slider Update Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function destroy($id)
    {
        $data = Slider::findOrFail($id);

        if ($data->slide) {
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
