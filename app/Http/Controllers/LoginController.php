<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashbord.pages-login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
            
        ]);

        $user = User::where('email',$validatedData['email'])->first();

        if ($user) {

            Auth::login($user);

            return redirect()->intended(route('home'));
        } else {

            return redirect()->back()->withErrors([
                'email' => 'The email or password is incorrect.',
            ]);
        }
    }
}
