<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Models\Network;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashbord.pages-register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirm' => 'required|same:password',
            'terms' => 'required'
        ]);
        $referralCode =Str::random(10);
if(isset($request->referral_code)){

    $userData = User::where('referral_code', $request->referral_code)->get();

if(count($userData)  > 0){


   $user_id = User::insertGetId([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'referral_code' => $referralCode
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
        'referral_code' => $referralCode
    ]);
}
$domain = URL::to('/') ;
$url = $domain.'referral_register?ref='.$referralCode;
$data['url'] = $url;
$data['name'] = $request->name;
$data['email'] = $request->email;
$data['password'] = $request->password;
$data['title'] = 'Registerd';

Mail::send('emails.mail', ['data' => $data],function($message) use($data){
$message->to($data['email'] )->subject($data['title']);
});

return redirect()->intended(route('home'))->with('success', 'User created successfully!');

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
