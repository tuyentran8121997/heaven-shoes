<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Banner;

class IndexController extends Controller
{
    public function index(){
        // In ascending order (by default)
        // $productsAll = Product::get();

        // In Descending order
        // $productsAll = Product::orderBy('id','DESC')->get();

        //Get all product
        $productsAll = Product::inRandomOrder()->where('status',1)->where('feature_item',1)->paginate(3);

        //Get all categories and sub categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        $banners = Banner::where('status','1')->get();

        return view('index')->with(compact('productsAll','categories','banners'));
    }
}
