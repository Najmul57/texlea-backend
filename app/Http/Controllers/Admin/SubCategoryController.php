<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::latest()->get();
        return view('backend.subcategory.index', compact('subcategories'));
    } // end method

    public function create()
    {
        $category=Category::latest()->get();
        return view('backend.subcategory.create',compact('category'));
    } // end method

    public function store(Request $request)
    {
        $data = new Subcategory();
        $data->category_id = $request->input('category_id');
        $data->name = $request->input('name');

        $data->save();

        $notification = array(
            'message' => 'SubCategory Store Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('subcategory.index')->with($notification);
    } // end method

    public function edit($id)
    {
        $data = Subcategory::findOrFail($id);
        $category=Category::latest()->get();
        return view('backend.subcategory.edit', compact('data','category'));
    } // end method

    public function update(Request $request, $id)
    {
        $data = Subcategory::findOrFail($id);
        $data->category_id = $request->input('category_id');
        $data->name = $request->input('name');
        
        $data->save();

        $notification = array(
            'message' => 'SubCategory Update Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('subcategory.index')->with($notification);
    } // end method


    public function destroy($id)
    {
        $data = Subcategory::findOrFail($id);


        $data->delete();

        $notification = array(
            'message' => 'SubCategory Delete Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // end method
}
