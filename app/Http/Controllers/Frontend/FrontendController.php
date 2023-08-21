<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function index()
    {
        $campaigns = Campaign::with('media')->latest('id')->take('3')->get();
        // dd($campaigns);
        $category = Category::orderBy('order', 'asc')->get();
        return view('frontend.home', compact('campaigns', 'category'));
        // dd("geldi");
    }

    public function categories()
    {
        return view('frontend.body.category');
        // dd("geldi");
    }
    public function categoryDetail($slug, $id)
    {
        if (isset($id)) {
            $products = Product::with('category', 'media')->where('category_id', $id)->get();
        } else {
            $products = [];
        }
        // dd($products);
        return view('frontend.body.category_details', compact('products'));
        // dd("geldi");
    }
    public function productDetail($slug, $id)
    {
        $products = Product::with('category', 'media')->where('id', $id)->get();
        // dd($products);
        return view('frontend.body.product_details', compact('products'));
        // dd("geldi");
    }
}
