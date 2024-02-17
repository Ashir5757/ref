<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Network;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BackendDashboardController extends Controller
{
   public function backendDashboard() {

   $users = User::all();
        return view('backend.index',compact('users'));
    }

    public function loadeproduct(){


        return view("backend.product");
    }
}
