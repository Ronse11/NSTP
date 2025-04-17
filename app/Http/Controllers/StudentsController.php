<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CommentTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Students;

class StudentsController extends Controller
{

    public function readComment($id)
    {
        $studentData = CommentTable::where('student_id', $id);
        $studentExist = $studentData->first();

        if($studentExist) {
            $studentData->delete();
        }

        return redirect()->back()->with('success', 'Deleted!');
    }

    public function appliedStudent(Request $request)
    {
        $request->validate([
            'school_year' => 'required',
            'school_id' => 'required|unique:students',
            'category' => 'required',
            'course' => 'required',
            'lname' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'ext' => 'nullable',
            'birthday' => 'required',
            'gender' => 'required',
            'brgy' => 'required',
            'city' => 'required',
            'province' => 'required',
            'hei_name' => 'required',
            'institutional_code' => 'required',
            'types_of_heis' => 'nullable',
            'contact_no' => 'required',
            'status' => 'nullable',
        ]);

        $userId = Auth::id();
        $category = Category::where('id', $request->input('category'))->first();

        try {
            $existUser = Students::where('student_id', $userId)->first();

            if(!$existUser) {

                Students::create([
                    'student_id' => $userId,
                    'school_year' => $request->input('school_year'),
                    'school_id' => $request->input('school_id'),
                    'course' => $request->input('course'),
                    'category' => $category->category_name,
                    'lname' => $request->input('lname'),
                    'fname' => $request->input('fname'),
                    'mname' => $request->input('mname'),
                    'ext' => $request->input('ext'),
                    'birthday' => $request->input('birthday'),
                    'gender' => $request->input('gender'),
                    'brgy' => $request->input('brgy'),
                    'city' => $request->input('city'),
                    'province' => $request->input('province'),
                    'hei_name' => $request->input('hei_name'),
                    'institutional_code' => $request->input('institutional_code'),
                    'types_of_heis' => $request->input('types_of_heis'),
                    'program_level_code' => $request->input('program_level_code'),
                    'contact_no' => $request->input('contact_no'),
                    'status' => 'pending',
                    'active' => true
                ]);

            } else {
                $existUser->update([
                    'student_id' => $userId,
                    'school_year' => $request->input('school_year'),
                    'school_id' => $request->input('school_id'),
                    'course' => $request->input('course'),
                    'category' => $category->category_name,
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

                return redirect()->back()->with('success', 'Updated!');
            }

            return redirect()->route('fillupstudentCategoryRead')->with('success', 'Thanks!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to register student.');
        }
    }
}
