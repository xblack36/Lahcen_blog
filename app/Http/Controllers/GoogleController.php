<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectGoogle(){
        return Socialite::driver("google")->redirect();
    }
    //if you want to login with faceboobk or an other type account you most be add new function with driver "facebook"
    
    public function handleGoogle(){
        try {
            // Fetch user details from Google
            $user = Socialite::driver("google")->stateless()->user();
    
            // Check if a user with the provided email already exists
            $existing_user = User::where('email', $user->getEmail())->first();
    
            if ($existing_user) {
                // Log in the existing user
                auth()->login($existing_user);
                return redirect()->route('postes.index');
            } else {
                // Create a new user and log them in
                 // Get the full name and split it into first and last names
                $fullName = $user->getName();
                $nameParts = explode(' ', $fullName, 2); // Split the name into two parts
                $firstName = $nameParts[0] ?? ''; // First part of the name
                $lastName = $nameParts[1] ?? '';  // Last part of the name, or empty if not present
                $new_user = User::create([
                    'firstname' => $firstName,
                    'lastname' => $lastName,
                    'email' => $user->getEmail(),
                    // Add any other fields you require (e.g., password, avatar)
                    'password' => bcrypt('random_password'), // Set a default password
                ]);  
    
                auth()->login($new_user);
                return redirect()->route('postes.index');
            }
        }catch(Exception $e){
            return view('auth/home')->with('errorGoogle',$e->getMessage());
        }
    }
}