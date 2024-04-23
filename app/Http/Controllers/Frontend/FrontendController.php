<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\ChildCategory;
use App\Models\Country;
use App\Models\Feature;
use App\Models\GlobalLocation;
use App\Models\ProductGallery;
use App\Models\Slider;
use App\Models\Subcategory;
use SebastianBergmann\Type\NullType;

class FrontendController extends Controller
{
  public function index()
  {
    $sliders = Slider::latest()->get();
    $features = Feature::latest()->get();
    $abouts = About::select('short_about', 'about_image')->first();
    $certificates = Certificate::all();
    $offices = Country::latest()->get();
    $categories = Category::latest()->get();
    // return $categories;
    return view('frontend.index', compact('sliders', 'features', 'abouts', 'certificates', 'offices', 'categories'));
  } // end method

  public function location()
  {

    $data = GlobalLocation::latest()->get();
    return view('frontend.global_location.location', compact('data'));
  } //  end method

  public function about()
  {
    $data = About::first();
    // return $data;
    return view('frontend.about.index', compact('data'));
  } /// end method

  public function category($slug)
  {
    $category = Category::where('slug', $slug)->first();
    $data = ProductGallery::where('category_id', $category->id)
      ->whereNull('subcategory_id')
      ->whereNull('childcategory_id')
      ->get();
    return view('frontend.category.index', compact('data', 'category'));
  }

  public function subcategory($slug)
  {
    $subcategory = Subcategory::where('slug', $slug)->first();
    $data = ProductGallery::where('subcategory_id', $subcategory->id)
      ->whereNull('childcategory_id')
      ->get();
    return view('frontend.subcategory.index', compact('data', 'subcategory'));
  }

  public function childcategory($slug)
  {
    $childcategory = ChildCategory::where('slug', $slug)->first();
    $data = ProductGallery::where('childcategory_id', $childcategory->id)->get();
    // dd($data);
    return view('frontend.childcategory.index', compact('data', 'childcategory'));
  }
}
