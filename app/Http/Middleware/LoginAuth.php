<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);

        // if(Auth::guard('web')->check()){
        //     if(!Auth::user()->role){
        //         return redirect()->route('getLogin')->with('error','You have to be admin user to access this page');
        //     }
        //     if(Auth::user()->hasRole('User')) {
        //         if($request->is('users') || $request->is('users/*')) {
        //             return redirect()->route('dash')->with('error','You do not have permission to access this page');
        //         }
        //     }
        // } else {
        //     return redirect()->route('getLogin')->with('error','You have to Sign in to Access this page');
        // }
        // return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
        //                       ->header('Pragma','no-cache')
        //                       ->header('Expire','Sat 01 Jan 1990 00:00:00 GMT');


        if (auth()->guard('admin')->check()) {
            $userRole = auth()->guard('admin')->user()->role;
    
            if (in_array($userRole, [0, 1])) {
                if ($request->is('users') || $request->is('users/*')) {
                    return redirect()->route('dash')->with('error', 'You do not have permission to access this page');
                }
            }
        } elseif (auth()->guard('web')->check()) {
            if ($request->is('students/list')) {
                return redirect()->route('fillupstudentCategoryRead')->with('error', 'No permission to access this page');
            }
        }else {
            return redirect()->route('login')->with('error', 'You have to sign in first to access this page');
        }
        
        $response = $next($request);
        $response->headers->set('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT');

        return $response;
                              
    }
}
