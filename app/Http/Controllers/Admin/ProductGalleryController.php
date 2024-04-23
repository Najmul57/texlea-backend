<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Models\ProductGallery;
use Image;
use App\Http\Controllers\Controller;

class ProductGalleryController extends Controller
{
    public function index()
    {
        $productgalleries = ProductGallery::latest()->get();
        return view('backend.product_gallery.index', compact('productgalleries'));
    } // end method

    public function create()
    {
        $categories = Category::latest()->get();
        $subcategory = Subcategory::latest()->get();
        $childcategory = ChildCategory::latest()->get();
        return view('backend.product_gallery.create', compact('categories', 'subcategory', 'childcategory'));
    } // end method

    public function store(Request $request)
    {
        $data = new ProductGallery();
        $data->category_id = $request->input('category_id');
        $data->subcategory_id = $request->input('subcategory_id');
        $data->childcategory_id = $request->input('childcategory_id');
        $data->name = $request->input('name');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/product_gallery'), $filename);
            Image::make(public_path('uploads/product_gallery') . '/' . $filename)->resize(420, 260)->save('uploads/product_gallery/' . $filename);
            $data->image = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Product Gallery Store Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('product_gallery.index')->with($notification);
    } // end method


    public function edit($id)
    {
        $categories = Category::latest()->get();
        $subCategories = Subcategory::latest()->get();
        $childCategories = ChildCategory::latest()->get();
        $productgallery = ProductGallery::find($id);
        // dd($productgallery);    
        return view('backend.product_gallery.edit', compact('categories', 'subCategories', 'childCategories', 'productgallery'));
    }

    public function update(Request $request, $id)
    {
        $data = ProductGallery::findOrFail($id);
        $data->category_id = $request->input('category_id');
        $data->subcategory_id = $request->input('subcategory_id');
        $data->childcategory_id = $request->input('childcategory_id');
        $data->name = $request->input('name');

        if ($request->hasFile('image')) {


            if ($data->slide && file_exists(public_path('uploads/product_gallery') . '/' . $data->slide)) {
                unlink(public_path('uploads/product_gallery') . '/' . $data->slide);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/product_gallery'), $filename);
            Image::make(public_path('uploads/product_gallery') . '/' . $filename)->resize(420, 260)->save('uploads/product_gallery/' . $filename);
            $data->image = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Product Gallerly Update Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('product_gallery.index')->with($notification);
    } // end method


    public function destroy($id)
    {
        $data = ProductGallery::findOrFail($id);

        if ($data->slide && file_exists(public_path('uploads/product_gallery') . '/' . $data->slide)) {
            unlink(public_path('uploads/product_gallery') . '/' . $data->slide);
        }

        $data->delete();

        $notification = array(
            'message' => 'Product Gallery Delete Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // end method

    public function getSubcategories($category_id)
    {
        $subcategories = Subcategory::where('category_id', $category_id)->get();
        return response()->json($subcategories);
    }

    public function getChildcategories($subcategory_id)
    {
        $childcategories = Childcategory::where('subcategory_id', $subcategory_id)->get();
        return response()->json($childcategories);
    }
}
