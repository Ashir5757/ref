<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Bazaar extends Controller
{
    public function loadbazzar()
    {
      $categories = Category::all();
      $products = Product::all();
        return view('frontend.bazaar' , compact('products','categories') );
    }

    public function loadreview($id, $user_id)
    {
      $users = Shop::where('id', $user_id)->get();
      $products = Product::where('id', $id)->get();
        return view('frontend.reviewproduct' , compact('products','users') );
    }

}
