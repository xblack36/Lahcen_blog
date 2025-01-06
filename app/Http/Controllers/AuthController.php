<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{

    public function home() {
        return view('auth.home');
    }

    public function login(Request $request){
        $verified=$request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($verified,$request->remember)) {
            return to_route('postes.index'); // Redirect to your desired route after login
        }else{
            return back()->withErrors([
                'failed'=>'the provided credencials do not match our record !'
            ]);
        }
    }

    public function logout(){
        Auth::logout();
        // $request->session()->invalidate(); 
        // $request->session()->regenerateToken();
        return to_route('auth.home');
    }

    public function register(){
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => ['required', 'string', 'max:20'],
            'lastname' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::create($validatedData);
        return redirect()->route('auth.home')->with('success','the account was created successfuly (^_^)');
    }
}

