<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Payment extends Controller
{
   public function payment(){
    return view("frontend.payment");
   }
}
