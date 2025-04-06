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
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);
    
        try {
            $user = User::create([
                'fname' => $validatedData['fname'],
                'lname' => $validatedData['lname'],
                'mname' => $validatedData['mname'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'role' => 'Student',
                'remember_token' => Str::random(60),
            ]);
    
            Auth::login($user);
    
            return redirect()->route('fillupstudentCategoryRead')->with('success', 'Registered and logged in successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Registration failed!');
        }
    }
    
}
