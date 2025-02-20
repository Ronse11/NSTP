<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Students;
use App\Models\User;

class RegisterController extends Controller
{
    public function studentRegister(Request $request)
    {
        if ($request->isMethod('post')) {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'fname' => 'required',
                'lname' => 'required',
                'email1' => 'required|email|unique:users,email',
                'password1' => 'required|min:8',
            ]);
    
            // Check if the email already exists in the Students model
            // $emailStud = $validatedData['email1']; 
            // $existingEmail = Students::where('email', $emailStud)->first();
    
            // if ($existingEmail) {
            //     return redirect()->back()->with('error', 'You already exist!');
            // }

            $user = User::create([
                'fname' => $validatedData['fname'],
                'lname' => $validatedData['lname'],
                'email' => $validatedData['email1'],
                'password' => Hash::make($validatedData['password1']),
                'role' => 'Student',
                'remember_token' => Str::random(60),
            ]);
    
            try {
                // Create a new user with the validated data
    
                // Log in the user
                Auth::login($user);
    
                // Redirect back with a success message
                return redirect()->route('fillupstudentCategoryRead')->with('success', 'Registered and logged in successfully!');
            } catch (\Exception $e) {
                return redirect()->route('categoryRead')->with('error1', 'Failed to Register!');
            }
        }
    }
}
