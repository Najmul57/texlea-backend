<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Image;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.category.index', compact('categories'));
    } // end method

    public function create()
    {
        return view('backend.category.create');
    } // end method

    public function store(Request $request)
    {

        $data = new Category();
        $data->name = $request->input('name');
        $data->slug = Str::slug($request->input('name'));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/category'), $filename);
            Image::make(public_path('uploads/category') . '/' . $filename)->resize(420, 260)->save('uploads/category/' . $filename);
            $data->image = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Category Store Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('category.index')->with($notification);
    } // end method

    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return view('backend.category.edit', compact('data'));
    } // end method

    public function update(Request $request, $id)
    {
        $data = Category::findOrFail($id);
        $data->name = $request->input('name');
        $data->slug = Str::slug($request->input('name'));

        if ($request->hasFile('image')) {
           
            if ($data->image && file_exists(public_path('uploads/category') . '/' . $data->image)) {
                unlink(public_path('uploads/category') . '/' . $data->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/category'), $filename);
            Image::make(public_path('uploads/category') . '/' . $filename)->resize(420, 260)->save('uploads/category/' . $filename);
            $data->image = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Category Update Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('category.index')->with($notification);
    } // end method


    public function destroy($id)
    {
        $data = Category::findOrFail($id);

        if ($data->image && file_exists(public_path('uploads/category') . '/' . $data->image)) {
            unlink(public_path('uploads/category') . '/' . $data->image);
        }

        $data->delete();

        $notification = array(
            'message' => 'Category Delete Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // end method
}
