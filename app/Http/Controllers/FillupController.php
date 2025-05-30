<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\Students;
use App\Models\Category;
use App\Models\CommentTable;
use Illuminate\Support\Facades\Auth;

class FillupController extends Controller
{
    public function fillupstudentCategoryRead()
    {
        $cat = Category::all();

        $userId = Auth::id();
        $notif = Students::where('student_id', $userId)
        ->where('status', 'accepted')
        ->first();

        $pending = Students::where('student_id', $userId)
        ->where('status', 'pending')
        ->first();

        $comment = CommentTable::where('student_id', $userId)
        ->first();

        return view('fillup.listcategory_form', ['cat' => $cat, 'notif' => $notif, 'pending' => $pending, 'comment' => $comment]);
    }

    public function fillupstudentRead($id)
    {
        $idDecrypt = decrypt($id);
        $category = Category::find($idDecrypt);
    	return view('fillup.listfillup_form', compact('category'));
    }



}
