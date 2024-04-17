<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Http\Controllers\Controller;
use App\Models\Subcategory;

class ChildCategoryController extends Controller
{
    public function index()
    {
        $childcategories = ChildCategory::latest()->get();
        return view('backend.childcategory.index', compact('childcategories'));
    } // end method

    public function create()
    {
        $category = Category::latest()->get();
        $subcategory = Subcategory::latest()->get();
        return view('backend.childcategory.create', compact('category', 'subcategory'));
    } // end method

    public function store(Request $request)
    {
        $data = new ChildCategory();
        $data->category_id = $request->input('category_id');
        $data->subcategory_id = $request->input('subcategory_id');
        $data->name = $request->input('name');

        $data->save();

        $notification = array(
            'message' => 'ChildCategory Store Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('childcategory.index')->with($notification);
    } // end method


    public function edit($id)
    {
        $categories = Category::all();
        $childcategory=ChildCategory::find($id);
        return view('backend.childcategory.edit', compact( 'categories','childcategory'));
    }   
    

    public function update(Request $request, $id)
    {
        $data = ChildCategory::findOrFail($id);
        $data->category_id = $request->input('category_id');
        $data->subcategory_id = $request->input('subcategory_id');
        $data->name = $request->input('name');

        $data->save();

        $notification = array(
            'message' => 'ChildCategory Update Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('childcategory.index')->with($notification);
    } // end method


    public function destroy($id)
    {
        $data = ChildCategory::findOrFail($id);


        $data->delete();

        $notification = array(
            'message' => 'ChildCategory Delete Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // end method

    
    public function getSubcategories($category_id)
    {
        $subcategories = Subcategory::where('category_id', $category_id)->get();
        return response()->json($subcategories);
    }
}
