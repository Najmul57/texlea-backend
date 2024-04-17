<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Certificate;
use App\Models\Country;
use App\Models\Feature;
use App\Models\Slider;

class FrontendController extends Controller
{
  public function slider()  {
    $sliders=Slider::latest()->get();
    $features=Feature::latest()->get();
    $abouts = About::select('short_about', 'about_image')->first();
    $certificates=Certificate::all();
    $offices=Country::latest()->get();
    return view('frontend.index',compact('sliders','features','abouts','certificates','offices'));
  }
}
