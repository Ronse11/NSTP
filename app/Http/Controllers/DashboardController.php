<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Students;
use App\Exports\StudentsExport;
use App\Models\CommentTable;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function dash() 
    {
        $studcwts = Students::where('category', '=', 'CWTS')->where('status', 'accepted')->count();
        $studlts = Students::where('category', '=', 'LTS')->where('status', 'accepted')->count();
        $studrotc = Students::where('category', '=', 'ROTC')->where('status', 'accepted')->count();
        $studall = Students::where('status', 'accepted')->count();

        $totalMale = Students::where('gender', '=', 'Male')->where('status', 'accepted')->count();
        $totalFemale = Students::where('gender', '=', 'Female')->where('status', 'accepted')->count();

        $totalMaleCwts = Students::where('category', '=', 'CWTS')->where('status', 'accepted')->where('gender', 'Male')->count();
        $totalMaleLts = Students::where('category', '=', 'LTS')->where('status', 'accepted')->where('gender', 'Male')->count();
        $totalMaleRotc = Students::where('category', '=', 'ROTC')->where('status', 'accepted')->where('gender', 'Male')->count();

        $totalFemaleCwts = Students::where('category', '=', 'CWTS')->where('status', 'accepted')->where('gender', 'Female')->count();
        $totalFemaleLts = Students::where('category', '=', 'LTS')->where('status', 'accepted')->where('gender', 'Female')->count();
        $totalFemaleRotc = Students::where('category', '=', 'ROTC')->where('status', 'accepted')->where('gender', 'Female')->count();


        return view('home.dashboard', compact('studcwts', 'studlts', 'studrotc', 'studall', 'totalMale', 'totalFemale', 'totalMaleCwts','totalMaleLts','totalMaleRotc','totalFemaleCwts','totalFemaleLts','totalFemaleRotc',)); 
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
        $studcwtsMale = Students::where('category', '=', 'CWTS')
        ->where('status', 'accepted')
        ->where('gender', 'Male')
        ->get();

        $studcwtsFemale = Students::where('category', '=', 'CWTS')
        ->where('status', 'accepted')
        ->where('status', 'Female')
        ->get();

        $studCount = Students::where('category', '=', 'CWTS')
        ->where('status', 'pending')
        ->count();

        return view('students.list_student', ['studcwtsMale' => $studcwtsMale, 'studcwtsFemale' => $studcwtsFemale, 'studCount' => $studCount]);
    }

    public function studentLTSShow()
    {
        $studltsMale = Students::where('category', '=', 'LTS')
        ->where('status', 'accepted')
        ->where('gender', 'Male')
        ->get();

        $studltsFemale = Students::where('category', '=', 'LTS')
        ->where('status', 'accepted')
        ->where('gender', 'Female')
        ->get();

        $studCount = Students::where('category', '=', 'LTS')
        ->where('status', 'pending')
        ->count();

        return view('students.list_student_lts', ['studltsMale' => $studltsMale,'studltsFemale' => $studltsFemale, 'studCount' => $studCount]);
    }

    public function studentrotcShow()
    {
        $studrotcMale = Students::where('category', '=', 'ROTC')
        ->where('status', 'accepted')
        ->where('gender', 'Male')
        ->get();

        $studrotcFemale = Students::where('category', '=', 'ROTC')
        ->where('status', 'accepted')
        ->where('gender', 'Female')
        ->get();

        $studCount = Students::where('category', '=', 'ROTC')
        ->where('status', 'pending')
        ->count();

        return view('students.list_student_rotc', ['studrotcMale' => $studrotcMale, 'studrotcFemale' => $studrotcFemale,'studCount' => $studCount]);
    }
    // SHOWING OF ACCEPTED STUDENTS ENDS HERE!

    public function allStudents()
    {
        $allStud = Students::where('status', 'accepted')->get();

        return view('students.all_students', ['allStud' => $allStud]);
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

    public function declineApplicant(Request $request, $id)
    {
        $student = Students::where('student_id', $id);
        $stdentExist = $student->first();

        if($stdentExist)
        {

            CommentTable::create([
                'student_id' => $id,
                'comment' => $request->input('comment')
            ]); 

            // $stdentExist->update([
            //     'status' => 'declined'
            // ]);

            $stdentExist->delete();
        }

        return redirect()->back()->with('success', 'Deleted!');
    }
    // ACCEPTING/DECLINING OF STUDENTS IN CLICKING BUTTON ENDS HERE!


    // EDITING OF STUDENTS DATA STARTS HERE!
    public function editStudent($id)
    {
        $studentData = Students::where('student_id', $id)->first();

        return view('fillup.edit_student', compact('studentData'));
    }

    public function editChosenStudent(Request $request, $id)
    {
        $studentData = Students::where('student_id', $id)->first();

        if($studentData) {
            $studentData->update([
                'school_year' => $request->input('school_year'),
                'school_id' => $request->input('school_id'),
                'course' => $request->input('course'),
                'lname' => $request->input('lname'),
                'fname' => $request->input('fname'),
                'mname' => $request->input('mname'),
                'ext' => $request->input('ext'),
                'gender' => $request->input('gender'),
                'brgy' => $request->input('brgy'),
                'city' => $request->input('city'),
                'province' => $request->input('province'),
                'hei_name' => $request->input('hei_name'),
                'institutional_code' => $request->input('institutional_code'),
                'types_of_heis' => $request->input('types_of_heis'),
                'program_level_code' => $request->input('program_level_code'),
                'contact_no' => $request->input('contact_no'),
            ]);
        }

        return redirect()->back()->with('success', 'Edited!');

    }
    // EDITING OF STUDENTS DATA ENDS HERE!

    // DELETING OF STUDENT DATA STARTS HERE!
    public function deleteStudent($id)
    {
        $studentData = Students::where('student_id', $id);
        $studentExist = $studentData->first();

        if($studentExist) {
            $studentData->delete();
        }

        return redirect()->back()->with('success', 'Deleted!');

    }
    // DELETING OF STUDENT DATA ENDS HERE!

    // EXPORTING OF STUDENT DATA STARTS HERE!
    public function exportAllStudents(Request $request)
    {
        $key = $request->query('key');

        return Excel::download(new StudentsExport($key), "{$key}_" . date('Y-m-d') . ".xlsx");
    }
    // EXPORTING OF STUDENT DATA ENDS HERE!

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout Successfully');
    }
    
}
