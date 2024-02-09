<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function loadeadmin(){
        $users = User::all();
        $admins = User::where("usertype", 1)->paginate(10);
        return view("backend.admins", compact('admins','users'));
    }
}
