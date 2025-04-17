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


        if (Auth::check()) {
            $user = Auth::user();
            
            // Role-based permissions
            if ($user->role === 'Administrator') {
                if ($request->is('students/*')) {
                    return redirect()->route('dash')
                        ->with('info', 'Redirected to admin dashboard');
                }
            } 
            elseif ($user->role === 'Student') {
                // Students cannot access admin pages
                if ($request->is('admin/*')) {
                    return redirect()->route('fillupstudentCategoryRead')
                        ->with('error', 'You do not have permission to access this page');
                }
            }
            else {
                // Unknown role type - restrict access
                return redirect()->route('getportal')
                    ->with('error', 'Your account does not have a valid role');
            }
        } 
        else {
            // Not authenticated
            return redirect()->route('getLogin')
                ->with('error', 'You must sign in to access this page');
        }
        
        $response = $next($request);
        $response->headers->set('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT');

        return $response;
                              
    }
}
