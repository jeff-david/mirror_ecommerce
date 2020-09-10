<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;

class GuestController extends Controller
{
    public function index()
    {
        $brands = Brand::all();

        $sliders = Slider::where('start', '<=', date('Y-m-d h:i:s'))
                 ->where('end', '>=', date('Y-m-d h:i:s'))
                ->where('status','active')
                ->get();

        $feature_products =  Product::where('status',Product::ACTIVE_PRODUCT)
                ->where('feature_products',2)
                ->get();
        
        $hot_deals = Product::where('status',Product::ACTIVE_PRODUCT)
                ->where('hot_deals',1)
                ->get();

        $special_offers = Product::where('status',Product::ACTIVE_PRODUCT)
                ->orderBy('id','DESC')
                ->limit(12)
                ->get();
                 
        return view('guest.home',compact('brands','sliders','feature_products','hot_deals','special_offers'));
    }
}
