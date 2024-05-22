<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product; // Add the missing import statement for the Product model

class SearchController extends Controller
{
   
    public function SearchProducts(Request $request)
    {
        $search = $request->input('search'); // Get the search input from the request
        
        if($search == null){
            return redirect()->back()->with('error', 'Please enter a search term');
        }else{
            
            $products = DB::table('products')
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orderByDesc('created_at') // Use orderByDesc to get the latest products first
                ->get();
        
            // Debug the products retrieved (optional)
            // dd($products);
        
            return view('frontend.searchresult', ['products' => $products, 'search' => $search]);
             
        }
        }
    public function SearchLiveProduct(Request $request){
        $query = $request->get('query');
        $products = Product::where('name', 'like', '%'.$query.'%')
                           ->orWhere('description', 'like', '%'.$query.'%')
                           ->orderBy('created_at', 'desc')->get();

        return response()->json($products);
    }
}



