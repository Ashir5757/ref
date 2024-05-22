<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class Bazaar extends Controller
{
    public function loadbazzar()
    {
      $categories = Category::all();
      $products = Product::all();
      $response = Http::withHeaders([
        "api-token" => "ZfCsJKZ3uMkieC99-mS4W-ga_LwMNCVR1qCTYQ8gF0K3rWxryJ3SesIN7VH2SX6GX2Q",
          "user-email" => "ashirabbasi5757@gmail.com",
             ])->get('https://www.universal-tutorial.com/api/getaccesstoken');

       $data = (array)json_decode($response->body());
       $auth_token = $data['auth_token'];


      $countryresponse = Http::withHeaders([
            "Authorization" => "Bearer ".$auth_token,
            "Accept" => "application/json"
           ])->get('https://www.universal-tutorial.com/api/countries');

         $countries = (array)json_decode($countryresponse->body());

        return view('frontend.bazaar' , compact('products','categories','countries') );
    }

    public function loadreview($id, $user_id)
    {
      $users = Shop::where('id', $user_id)->get();
      $products = Product::where('id', $id)->get();
        return view('frontend.reviewproduct' , compact('products','users') );
    }

}
