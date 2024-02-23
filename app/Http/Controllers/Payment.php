<?php

namespace App\Http\Controllers;

use App\Models\PaymentModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Payment extends Controller
{
   public function payment(){
    return view("frontend.payment");
   }

   public function loadepayment() {

    $payments = PaymentModel::all();

    if ($payments->isNotEmpty()) {

        return view("backend.payment", compact('payments'));
    } else {
        // If there are no payments, simply return the view without compacting any data
        return view("backend.payment");
    }
}

public function receivepayment(Request $request)
{

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'image' => 'required',
    ]);


    if ($request->hasFile('image')) {
        $imageName = uniqid() . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('public/payment', $imageName);
    }

    $payment = new PaymentModel;
    $payment->name = $request->name;
    $payment->email = $request->email;
    $payment->image =  $imageName;

    $payment->save();

  $message = 'Thank you for submitting your application! We will review it within 3-4 business days and notify you via email about the decision. We appreciate your interest in the Share&Care System!';
    $request->session()->flash('success', $message);


    return redirect()->back();

}

public function editpayment($id){

    $payments = PaymentModel::where('id', $id)->get();

    return view("backend.editpayment", compact('payments'));
}

public function paymentstatus(Request $request ,$id){

    $payment = PaymentModel::findOrFail($id);


    $payment->status = $request->input('paymentstatus');


    $payment->save();


    return redirect()->back()->with('success', 'Payment status updated successfully');

}

}
