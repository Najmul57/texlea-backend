<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

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


        $data->delete();

        $notification = array(
            'message' => 'Category Delete Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // end method
}
