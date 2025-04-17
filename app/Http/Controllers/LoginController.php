<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }

    public function adminLogin(Request $request)
    {
        $data = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if (Auth::validate($data)) {
            $user = User::where('email', $data['email'])->first();
            
            if ($user && $user->role === 'Administrator') {
                Auth::login($user);
                $request->session()->regenerate();
                
                return redirect()->route('dash');
            } else {
                return redirect()->back()->with('error', 'Invalid Credentials');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }
    
    public function studentLogin(Request $request)
    {
        $data = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        
        if (Auth::validate($data)) {
            $user = User::where('email', $data['email'])->first();
            
            if ($user && $user->role === 'Student') {
                Auth::login($user);
                $request->session()->regenerate();
                
                return redirect()->route('fillupstudentCategoryRead');
            } else {
                return redirect()->back()->with('error', 'Invalid Credentials');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }
}
