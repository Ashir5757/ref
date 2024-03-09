<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Network;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BackendDashboardController extends Controller
{
   public function backendDashbord() {

   $users = User::all();
        return view('backend.index',compact('users'));
    }

    public function loadeproduct(){
    $categories = Category::all();
        // Pass the products to the view or use them further
        return view('backend.product', compact('categories'));
    }
}
