<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Students;

class DashboardController extends Controller
{
    public function dash() 
    {
        $studcwts = Students::where('category', '=', 'CWTS')->where('status', 'accepted')->count();
        $studlts = Students::where('category', '=', 'LTS')->where('status', 'accepted')->count();
        $studrotc = Students::where('category', '=', 'ROTC')->where('status', 'accepted')->count();
        $studall = Students::count();

        return view('home.dashboard', compact('studcwts', 'studlts', 'studrotc', 'studall')); 
    }

    // SHOWING OF APPLIED STUDENTS STARTS HERE!
    public function appliedCwts()
    {
        $appliedStudCwts = Students::where('category', '=', 'CWTS')
        ->where('status', 'pending')
        ->get();
        return view('appliedStudents.list_applied_cwts', compact('appliedStudCwts'));
    }
    public function appliedRotc()
    {
        $appliedStudCwts = Students::where('category', '=', 'ROTC')
        ->where('status', 'pending')
        ->get();
        return view('appliedStudents.list_applied_rotc', compact('appliedStudCwts'));
    }
    public function appliedLts()
    {
        $appliedStudCwts = Students::where('category', '=', 'LTS')
        ->where('status', 'pending')
        ->get();
        return view('appliedStudents.list_applied_lts', compact('appliedStudCwts'));
    }
    // SHOWING OF APPLIED STUDENTS ENDS HERE!

    // SHOWING OF ACCEPTED STUDENTS STARTS HERE!
    public function studentcwtsShow()
    {
        $studcwts = Students::where('category', '=', 'CWTS')
        ->where('status', 'accepted')
        ->get();
        return view('students.list_student', compact('studcwts'));
    }

    public function studentLTSShow()
    {
        $studlts = Students::where('category', '=', 'LTS')
        ->where('status', 'accepted')
        ->get();
        return view('students.list_student_lts', compact('studlts'));
    }

    public function studentrotcShow()
    {
        $studrotc = Students::where('category', '=', 'ROTC')
        ->where('status', 'accepted')
        ->get();
        return view('students.list_student_rotc', compact('studrotc'));
    }
    // SHOWING OF ACCEPTED STUDENTS ENDS HERE!

    // ACCEPTING/DECLINING OF STUDENTS IN CLICKING BUTTON STARTS HERE!
    public function acceptedApplicant($id)
    {
        $student = Students::where('student_id', $id);
        $stdentExist = $student->first();

        try {

            if($stdentExist)
            {
                $stdentExist->update([
                    'status' => 'accepted'
                ]);
            }

            return redirect()->back()->with('success', 'Thanks!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to register student.');
        }
    }

    public function declineApplicant($id)
    {
        $student = Students::where('student_id', $id);
        $stdentExist = $student->first();

        if($stdentExist)
        {
            $stdentExist->update([
                'status' => 'declined'
            ]);
        }

        return redirect()->back()->with('success', 'Deleted!');
    }
    // ACCEPTING/DECLINING OF STUDENTS IN CLICKING BUTTON ENDS HERE!


    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout Successfully');
    }
}
