<?php

namespace App\Http\Controllers;

use Mail;
use Carbon\Carbon;
use App\Models\User;

use App\Models\Network;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  public function __construct()
    //  {
    //      $this->middleware('guest')->except('logout');
    //      $this->middleware('guest:admin')->except('logout');
    //      $this->middleware('guest:user')->except('logout');
    //  }


     public function loadDashbord()
    {

        $networkCount = Network::where('parent_user_id',Auth::user()->id)->orWhere('user_id',Auth::user())->count();
     $networkData =  Network::with('user')->where('parent_user_id',Auth::user()->id)->get();
     $user = Auth::user();
     $profile = Profile::where('id', $user->id)->first();
        return view('dashbord.index',compact(['networkCount','networkData', 'profile']));

    }

    public function loadRegister()
    {
        return view('dashbord.pages-register');
    }

    public function referralTrack()
    {
        $dataLabels = [];
        $dataData = [];


        for ($i = 30; $i >= 0; $i--) {

            $dataLabels[]  = Carbon::now()->subDays($i)->format('d-m-Y');
            $dataData[] = Network::whereDate('created_at',Carbon::now()->subDays($i)->format('Y-m-d') )
            ->where('parent_user_id',Auth::user()->id)->count();

        }

        $dataLabels = json_encode($dataLabels);
        $dataData = json_encode($dataData);


        return view('dashbord.charts-chartjs', compact(['dataLabels', 'dataData']));
    }



public function userLogout(Request $request){
    $request->session()->flush();
    auth()->guard('web')->logout();

    return redirect('login')->with('success','You have been logged out successfully.');
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
        'remember_token'=> $token,
        'created_at' => now(),
    ]);

    Network::insert([
'referral_code' => $request->referral_code,
'user_id' => $user_id,
'parent_user_id' => $userData[0]['id'],
'created_at' => now()
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
        'remember_token'=> $token,
        'created_at' => now()
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

        return view('dashbord.pages-login') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function userLogin(Request $request)
    {
      $data = $request->validate([
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

    if(isset($userCredential)){

        if(isset($userCredential['email']) && isset($userCredential['password'])) {

            if($userData->usertype == 1) {

                return redirect('backend');
            } else {

                return redirect('/');
            }
        }
    }





    // if (auth()->guard('web')->attempt(['email' => $email, 'password' => $password ,  $request->get('remember')])) {

        // return redirect('/user-dashboard'); // Redirect to user dashboard

    // }
    // if (auth()->guard('admin')->attempt(['email' => $email, 'password' => $password, $request->get('remember')])) {

        // return redirect('/admin-dashboard'); // Redirect to admin dashboard

    // }

}else{

return  back()->with('error','User name or password is incorrect!');
}
    }



    public function deleteAccount(Request $request)
    {

        try{
    User::where('id',Auth::user()->id)->delete();

    auth()->guard('web')->logout();
    return redirect()->route('login')->with("success" , "Account Successfullly Deleted");
            return response()->json(['success'=>true]);
}
            catch (Exception $error) {
               return response()->json(['success' => false, 'msg' => $error->getMessage()]);
           }
        }


public function loadfaq(){
    $user = Auth::user();
    $profile = Profile::where('id', $user->id)->first();
    return view("dashbord.pages-faq",compact(['profile']));
}







public function loadcontact() {
    $user = Auth::user();
    $profile = Profile::where('id', $user->id)->first();
    return view('dashbord.pages-contact',compact(['profile']));
}

public function userReceiveMail(Request $request){

    $validatedData = $request->validate(
[
    'name' => 'required|string',
'email' => 'required|string',
'subject' => 'required|string',
'textarea' => 'required|string',

]);

$data['name'] = $request->name;
$data['email'] = $request->email;
$data['subject'] = $request->subject;
$data['textarea'] = $request->textarea ;

Mail::send("emails.receiveMail", ['data' => $data], function($message) use($data){
    $message->to('ashirabbasi5757@gmail.com')->subject($data['subject']);
});

return redirect()->back()->with('success', 'Your Mail has been received');
}
  }






