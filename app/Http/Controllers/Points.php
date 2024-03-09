<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Points extends Controller
{

    public function investmentbonus(){

$payment_status = Payment::where('ststus',1)->get();
dd($payment_status);


    }
}
