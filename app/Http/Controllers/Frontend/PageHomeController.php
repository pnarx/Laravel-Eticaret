<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use App\Models\About;
use App\Models\Product;

use App\Http\Controllers\Backend\SliderController;


use Illuminate\Http\Request;

class PageHomeController extends Controller
{
    public function anasayfa() {
        $slider = Slider::where('status','1')->first();

        $title = "Anasayfa";

        $products= Product ::all();
        $about= About :: where('id' , 1)->first();
        $sliders = Slider::all();
        return view('frontend.pages.index',compact('slider','title','about','products','sliders'));


    }

}
