<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
   
    public function SearchProducts(Request $request)
    {
        $search = $request->input('search'); // Get the search input from the request
        
        $products = DB::table('products')
        ->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($search) . '%'])
        ->orderByDesc('created_at') // Use orderByDesc to get the latest products first
            ->get();
    
        // Debug the products retrieved (optional)
        // dd($products);
    
        return view('frontend.searchresult', ['products' => $products, 'search' => $search]);
         
    }
}



