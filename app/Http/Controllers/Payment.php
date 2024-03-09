<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Points;
use App\Models\Network;
use App\Models\PaymentModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Payment extends Controller
{
   public function payment($id){
    $investment_plan = $id;
    return view("frontend.payment",compact('investment_plan'));
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

    $user = User::where("email", $request->email)->first();

    if($user){

    $payment = new PaymentModel;
    $payment->user_id = $user->id;
    $payment->name = $request->name;
    $payment->email = $request->email;
    $payment->image =  $imageName;
    $payment->plan =  $request->investment_plan;

    $payment->save();
    }

        $payment = new PaymentModel;
        // $payment->user_id = $user->id;
        $payment->name = $request->name;
        $payment->email = $request->email;
        $payment->image =  $imageName;
        $payment->plan =  $request->investment_plan;



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

    $paymentstatus = $request->input('paymentstatus');

    if ($paymentstatus == 1) {
        $user = User::find($payment->user_id);

        if ($user) {
            // Retrieve or initialize investment bonus and referral points
            $points = Points::where("user_id", $id)->first();
            if ($points == null) {
                $parent_user_id = Network::where('parent_user_id', $user->id)->count();
                $up_liner = 0;
foreach (Network::where('up_liner', $user->id)->get() as $record) {
    $up_liner += 0.2;
}
                $networkCount = $parent_user_id + $up_liner;
                $investment_bonus = 1.5;

                // Save both investment_bonus and referral_points
                Points::updateOrCreate(
                    ['user_id' => $payment->user_id],
                    ['investment_bonus' => $investment_bonus, 'referral_points' => $networkCount]
                );
            }
        }

        $payment->status = $paymentstatus;
        $payment->save();
        return redirect()->back()->with('success', 'Payment status updated successfully');
    } else {
        $payment->status = $paymentstatus;
        $payment->save();
        return redirect()->back()->with('success', 'Payment status updated successfully');
    }
}

public function withdrawl(){
    return view("dashbord.withdrawl");
}

}
