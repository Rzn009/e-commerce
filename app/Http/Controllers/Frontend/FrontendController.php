<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index ()
    {
        $category = Category::select('id','name')->latest()->get();
        $product = Product::with('product_gallery')->select('id','name','slug','price')->latest()->limit(8)->get();
        return view('pages.frontend.index', compact('category','product'));
    }
    public function deatailProduct($slug)
    {   
        $product = Product::with('product_gallery')->where('slug',$slug)->first();
        $category = Category::select('id','name')->latest()->get();
        return view('pages.frontend.detail', compact('product','category'));
    }
}
