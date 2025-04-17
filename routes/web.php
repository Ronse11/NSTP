<?php

use App\Http\Controllers\AppliedStudentsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PortalController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentsController;

use App\Http\Controllers\FillupController;
use App\Models\Students;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['guest']], function(){
    Route::get('/', function () {
        return view('layout.master_layoutportal');
    });
    Route::get('/portal', [PortalController::class,'getportal'])->name('getportal');
    Route::get('/erroradmin', [LoginController::class,'getLogin'])->name('getLogin');
});

Route::post('/portal/register/student', [RegisterController::class,'studentRegister'])->name('studentRegister');

Route::post('/student-login', [LoginController::class,'studentLogin'])->name('studentLogin');
Route::post('/admin-login', [LoginController::class,'adminLogin'])->name('adminLogin');

Route::group(['middleware' => ['login_auth']], function(){
    Route::get('/dashboard', [DashboardController::class,'dash'])->name('dash');

    Route::get('admin/students/list/cwts', [DashboardController::class,'studentcwtsShow'])->name('studentcwtsShow');
    Route::get('admin/students/list/lts', [DashboardController::class,'studentLTSShow'])->name('studentLTSShow');
    Route::get('admin/students/list/rotc', [DashboardController::class,'studentrotcShow'])->name('studentrotcShow');
    Route::get('admin/students/all_list', [DashboardController::class,'allStudents'])->name('allStudents');

    Route::get('admin/students/list/edit/{id}', [DashboardController::class,'editStudent'])->name('editStudent');
    Route::post('admin/students/list/edit/{id}', [DashboardController::class,'editChosenStudent'])->name('editChosenStudent');
    Route::get('admin/students/list/delete/{id}', [DashboardController::class,'deleteStudent'])->name('deleteStudent');
    Route::get('/students/comment/delete/{id}', [StudentsController::class,'readComment'])->name('readComment');


    Route::get('/students/category/select', [FillupController::class,'fillupstudentCategoryRead'])->name('fillupstudentCategoryRead');
    Route::get('/students/fillup/{id}', [FillupController::class,'fillupstudentRead'])->name('fillupstudentRead');

    Route::post('/students/fillup/add', [StudentsController::class,'appliedStudent'])->name('appliedStudent');
    
    Route::get('admin/students/category/list/applied/cwts', [DashboardController::class, 'appliedCwts'])->name('appliedCwts');
    Route::get('admin/students/category/list/applied/rotc', [DashboardController::class, 'appliedRotc'])->name('appliedRotc');
    Route::get('admin/students/category/list/applied/lts', [DashboardController::class, 'appliedLts'])->name('appliedLts');
    Route::post('admin/students/category/list/applied/accept/{id}', [DashboardController::class, 'acceptedApplicant'])->name('acceptedApplicant');
    Route::post('admin/students/category/list/applied/decline/{id}', [DashboardController::class, 'declineApplicant'])->name('declineApplicant');

    Route::get('admin/exports/students', [DashboardController::class, 'exportAllStudents'])->name('export.all.students');

    // BUTTON CLICK FOR ATIVE AND INACTIVE
    Route::post('admin/students/toggle-status/{id}', [DashboardController::class, 'toggleStatus']);


    Route::get('/logout', [DashboardController::class,'logout'])->name('logout');
});
