<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Models\Network;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function loadRegister()
    {
        return view('dashbord.pages-register');
    }


    public function loadDashboard()
    {
        return view('dashbord.index');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function registerd(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm' => 'required|same:password',
            'terms' => 'required'
        ]);
        $referralCode =Str::random(10);
       $token = Str::random(50);
if(isset($request->referral_code)){

    $userData = User::where('referral_code', $request->referral_code)->get();

if(count($userData)  > 0){


   $user_id = User::insertGetId([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'referral_code' => $referralCode,
        'remember_token'=> $token
    ]);

    Network::insert([
'referral_code' => $request->referral_code,
'user_id' => $user_id,
'parent_user_id' => $userData[0]['id'],
    ]);

}else{

  return back()->with('error' , 'Please Enter a valid Referral Code');
}

}else{

    User::insert([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'referral_code' => $referralCode,
        'remember_token'=> $token
    ]);
}
$domain = URL::to('/');
$url = $domain.'/referral_register?ref='.$referralCode;
$data['url'] = $url;
$data['name'] = $request->name;
$data['email'] = $request->email;
$data['password'] = $request->password;
$data['title'] = 'Registerd';

Mail::send('emails.mail', ['data' => $data],function($message) use($data){
$message->to($data['email'] )->subject($data['title']);
});


// varification mail send


$url = $domain.'/email_varification/'.$token;
$data['url'] = $url;
$data['name'] = $request->name;
$data['email'] = $request->email;

$data['title'] = 'Refferal varification Mail';

Mail::send('emails.varifyMail', ['data' => $data],function($message) use($data){
$message->to($data['email'] )->subject($data['title']);
});
return redirect()->intended(url('login'))->with('success', 'User created successfully Now please varify your mail..!');

    }
    /**
     * Display the specified resource.
     */
    public function loadReferralRegister(Request $request)
    {
if(isset($request->ref)){

  $referral = $request->ref;
  $userData = user::where('referral_code',$referral)->get();

if(count($userData) > 0){

return view('dashbord.referral_register', compact('referral'));

}else{
    return view('dashbord.pages-error-404');
}


}else{
    return redirect('/');
}
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function emailVarification($token)
    {
      $userData =  User::where('remember_token',$token)->get();
if(count($userData)  > 0 ){

    if($userData[0]['is_verified'] == 1){

        return view('dashbord.email_varification',['message'=>'your Mail is Already varified now redirecting you to main page...!']);

    }
    User::where('id',$userData[0]['id'])->update([
        'is_verified' => 1,
        'email_verified_at' => date('Y-m-d H:i:s')
    ]);
    return view('dashbord.email_varification', [
        'message' => 'Your ' . $userData[0]['email'] . ' mail varified successfully now redirecting you to main page...!'
    ]);

}else{

    return view('dashbord.pages-error-404',['message'=>'404 page not found']);
}

    }

    /**
     * Update the specified resource in storage.
     */
    public function loadLogin()
    {
        dd(view('dashbord.pages-login')) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function userLogin(Request $request)
    {
      $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);
        $userData = User::where('email', $data['email'])->first();
        if(!empty($userData)){

if($userData->is_verified == 0){

    return redirect()->back()->with('error','Please varify your email');
}
        }
$userCredential = $request->only('email','password');
if(Auth::attempt($userCredential)){


    return redirect('/');

}else{

return  back()->with('error','User name or password is incorrect!');
}
    }
}
