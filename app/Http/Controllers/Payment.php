<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Points;
use App\Models\Network;
use App\Models\withdrawal;
use App\Models\PaymentModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Payment extends Controller
{

    public function  loadinvestpoints(){
      $points = Points::where('user_id',Auth::user()->id)->first();
            return view("dashbord.investpoints",compact('points'));

    }
   public function payment($id){
    $investment_plan = $id;
    return view("frontend.payment",compact('investment_plan'));
   }

   public function loadepayment() {

    $payments = PaymentModel::paginate(5);

    if ($payments->isNotEmpty()) {

        return view("backend.payment", compact('payments'));
    } else {
        return view("backend.payment");
    }
}
public function withdrawalstore($id,Request $request){

    $request->validate([
        'withdrawal_amount' => 'required|integer|min:4',
        'withdrawal_details' => 'nullable'
    ]);

    $userPoints = Points::where('user_id',$id)->first();

    $withdrawal = new withdrawal();
    $withdrawal->user_id = $id;
    $withdrawal->amount = $request->withdrawal_amount;
    $withdrawal->details = $request->withdrawal_details;
    $withdrawal->total_amount = $userPoints->total_points;

    $remainingAmount = $userPoints->total_points - $request->withdrawal_amount;

    $withdrawal->remaining_amount = $remainingAmount;

    $withdrawal->save();
    return redirect()->back()->with('status', 'Withdrawal request submitted successfully!');
}

public function receivepayment(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
        'investment_plan' => 'required|string|max:255'
    ]);

    try {
        // Check if a payment record already exists for the given email
        $payment = PaymentModel::where('email', $request->email)->first();

        if ($payment) {
            // If it's a renewal
            if ($payment->renewal !== null && $payment->renewal > 0) {
                $renewalCount = $payment->renewal + 1;
            } else {
                // If it's the first-time payment
                $renewalCount = 1;
            }
        } else {
            // If no payment record exists, it's a first-time payment
            $renewalCount = null;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = uniqid() . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/payment', $imageName);
        }

        // Find the user
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Save payment details
            $payment = new PaymentModel();
            $payment->user_id = $user->id;
            $payment->name = $request->name;
            $payment->email = $request->email;
            $payment->image = $imageName;
            $payment->plan = $request->investment_plan;
            $payment->renewal = $renewalCount;

            $payment->save();

            $message = 'Thank you for submitting your application! We will review it within 3-4 business days and notify you via email about the decision. We appreciate your interest in the Share&Care System!';
            $request->session()->flash('success', $message);
        }

        return redirect()->back();

    } catch (\Exception $e) {
        // Log the exception message for debugging
        \Log::error('Payment processing error: ' . $e->getMessage());

        // Flash an error message to the session
        $request->session()->flash('error', 'There was an error processing your payment. Please try again later.');

        return redirect()->back()->withInput();
    }
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

            $user->subscription_expires_at = Carbon::now()->addMonths(6);
            $user->save();

            try {
                $points = Points::where("user_id", $user->id)->first();
            } catch (\Exception $e) {
                $points = null;
            }

            try {
                $network = Network::where("user_id", $user->id)->first();
            } catch (\Exception $e) {
                $network = null;
            }

            try {
                $parent_user = User::where('id', $network->parent_user_id)->first();
            } catch (\Exception $e) {
                $parent_user =  null;
            }

            try {
                $user_points = Points::where("user_id", $user->id)->first();
            } catch (\Exception $e) {
                $user_points = null;
            }

            try{
                $up_liner =  Network::where('up_liner', $network->up_liner)->first();
            } catch (\Exception $e) {
                $up_liner = 0;
            }
            try{
                $up_liner_points =  points::where('user_id', $up_liner->up_liner)->first();
            } catch (\Exception $e) {
                $up_liner_points = 0;
            }
            try {
                    $parent_user_point = Points::where("user_id", $parent_user->id)->first();
            } catch (\Exception $e) {
                $parent_user_point = 0;
            }
            if ($points) {

                if ($parent_user_point !== 0) {
                    if ($payment->plan == 1) {
                        $parent_user_point->referral_points += 1;
                    } elseif ($payment->plan == 2) {
                        $parent_user_point->referral_points += 3;
                    } elseif ($payment->plan == 3) {
                        $parent_user_point->referral_points += 10;
                    }
                    $parent_user_point->save();
                }


                if ($up_liner_points !== 0) {

                        if ($payment->plan == 1) {
                            $up_liner_points->referral_points  += 0.2;
                        } elseif ($payment->plan == 2) {

                            $up_liner_points->referral_points  += 2;

                        } elseif ($payment->plan == 3) {
                            $up_liner_points->referral_points  += 5;
                        }

                        $up_liner_points->save();
                    }

                    $parent_user_id = 0;
                    try {
                        $parent_user_id = Network::where('parent_user_id', $user->id)->count();
                    } catch (\Exception $e) {
                        $parent_user_id = 0;
                    }

                    $up_liner = 0;
                    try {
                        foreach (Network::where('up_liner', $user->id)->get() as $record) {
                            $up_liner += 0.2;
                        }
                    } catch (\Exception $e) {
                $up_liner = 0;
            }

            $networkCount = $parent_user_id + $up_liner;
            $totalApprovedPayments = PaymentModel::where('status', 1)
            ->where('user_id', $payment->user_id)
            ->count();

            if($payment->renewal != null && $payment->renewal > 0){

                if ($payment->plan == 1) {
                    $renewal_points = $totalApprovedPayments * $payment->plan + 1.5;
                } elseif ($payment->plan == 2) {
                    $renewal_points = $totalApprovedPayments * $payment->plan + 4.5;
                } elseif ($payment->plan == 3) {
                    $renewal_points = $totalApprovedPayments * $payment->plan + 15;
                } else {
                    $renewal_points = $totalApprovedPayments * $payment->plan;
                }


    $total_points = $renewal_points + $networkCount + $user_points->investment_bonus;
   


    Points::updateOrCreate(
        ['user_id' => $payment->user_id],
        [ 'referral_points' => $networkCount, 'total_points' => $total_points ,'renewal_points' => $renewal_points]
    );

            }else{

                            if ($payment->plan == 1) {
                                $investment_bonus = $totalApprovedPayments * $payment->plan + 1.5;
                            } elseif ($payment->plan == 2) {
                                $investment_bonus = $totalApprovedPayments * $payment->plan + 4.5;
                            } elseif ($payment->plan == 3) {
                                $investment_bonus = $totalApprovedPayments * $payment->plan + 15;
                            } else {
                                $investment_bonus = $totalApprovedPayments * $payment->plan;
                            }
                $total_points = $investment_bonus + $networkCount;

                Points::updateOrCreate(
                    ['user_id' => $payment->user_id],
                    ['investment_bonus' => $investment_bonus, 'referral_points' => $networkCount, 'total_points' => $total_points ]
                );
            }






            $payment->status = $paymentstatus;
                $payment->save();
                return redirect()->back()->with('success', 'Payment status updated successfully');

            }else{


                Points::Create(
                    ['user_id' => $payment->user_id],
                    ['investment_points' => 0,'investment_bonus' => 0,'referral_points' => 0]
                );

                if ($parent_user_point !== 0) {
                    if ($payment->plan == 1) {
                        $parent_user_point->referral_points += 1;
                    } elseif ($payment->plan == 2) {
                        $parent_user_point->referral_points += 4;
                    } elseif ($payment->plan == 3) {
                        $parent_user_point->referral_points += 10;
                    }
                    $parent_user_point->save();
                }


                if ($up_liner_points !== 0) {

                    if ($payment->plan == 1) {
                        $up_liner_points->referral_points  += 0.2;
                    } elseif ($payment->plan == 2) {
                        $up_liner_points->referral_points  += 2;
                    } elseif ($payment->plan == 3) {
                        $up_liner_points->referral_points  += 5;
                    }

                    $up_liner_points->save();
        }


            $parent_user_id = 0;
            try {
                $parent_user_id = Network::where('parent_user_id', $user->id)->count();
            } catch (\Exception $e) {
                $parent_user_id = 0;
            }
            // dd($parent_user_id); No User referrals
            $up_liner = 0;
            try {
                foreach (Network::where('up_liner', $user->id)->get() as $record) {
                    $up_liner += 0.2;
                }
            } catch (\Exception $e) {
                $up_liner = 0;
            }

            $networkCount = $parent_user_id + $up_liner;
            $totalApprovedPayments = PaymentModel::where('status', 1)
                ->where('user_id', $payment->user_id)
                ->count();

                if ($payment->plan == 1) {
                    $investment_bonus = $totalApprovedPayments * $payment->plan + 1.5;
                } elseif ($payment->plan == 2) {
                    $investment_bonus = $totalApprovedPayments * $payment->plan + 4.5;
                } elseif ($payment->plan == 3) {
                    $investment_bonus = $totalApprovedPayments * $payment->plan + 15;
                } else {
                    $investment_bonus = $totalApprovedPayments * $payment->plan;
                }


                Points::updateOrCreate(
                    ['user_id' => $payment->user_id],
                    ['investment_bonus' => $investment_bonus, 'referral_points' => $networkCount, 'total_points' => $networkCount + $investment_bonus]
                );

                $payment->status = $paymentstatus;
                $payment->save();
                return redirect()->back()->with('success', 'Payment status updated successfully');

            }
        }

                $payment->status = $paymentstatus;
                $payment->save();
                return redirect()->back()->with('success', 'Payment status updated successfully');
        }
        $payment->status = $paymentstatus;
        $payment->save();
        return redirect()->back()->with('success', 'Payment status updated successfully');
    }



public function withdrawalrequest(){
    $withdrawalRequests = withdrawal::latest()->paginate(5);
    return view('backend.withdrawalrequest', compact('withdrawalRequests'));
}


public function withdrawal(){
    $user = Auth::user()->id;
    $points = Points::where('user_id',$user)->first();
    return view("dashbord.withdrawal",compact('points'));
}


public function editwithdrawal( $user_id,$id)  {

    $withdrawals = withdrawal::where('user_id', $user_id)->where('id', $id)->first();
    $user = User::where('id',$user_id)->first() ;

    return view('backend.editwithdrawal', compact('withdrawals','user'));
}


public function withdrawalstatus(Request $request, $user_id, $id) {

    $withdrawal = withdrawal::where('user_id', $user_id)->where('id', $id)->first();
    if ($request->status == 1) {
        $points = Points::where('user_id', $user_id)->first();
        $points->total_points -= $withdrawal->amount;
        $points->save();
        $withdrawal->status = $request->status;
        $withdrawal->save();
        return redirect()->back()->with('success', 'Payment has been updated successfully');
    } else {
        return redirect()->back()->with('success', 'Payment status remains the same');
    }
}

public function viewwithdrawal(){
        $withdrawals = withdrawal::latest()->paginate(5);
        return view('dashbord.viewwithdrawals', compact('withdrawals'));
}
public function approvedslip($id){
    $payment = withdrawal::where('id',$id)->first();
    return view('dashbord.approvedslip', compact('payment'));
}
}
