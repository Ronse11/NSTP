<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }
    
    public function postLogin(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        auth()->guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        auth()->guard('web')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if(Auth::user()) {
            $user = Auth::user()->role;
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }


        if($user == 'Administrator') {
            return redirect()->route('dash')->with('success', 'Login Successfully');
        } elseif($user == 'Student') {
            return redirect()->route('fillupstudentCategoryRead');
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }

        // if ($validatedUser) {
        //     return redirect()->route('dash')->with('success', 'Login Successfully');
        // } elseif ($validatedStudents) {
        //     return redirect()->route('fillupstudentCategoryRead');
        // } else {
        //     return redirect()->back()->with('error', 'Invalid Credentials');
        // }
    }
}
