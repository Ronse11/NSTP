<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Students extends Authenticatable
{
    use HasFactory;
    protected $table = 'students';

    protected $fillable = [
        'student_id',
        'school_year',
        'school_id',
        'category',
        'course',
        'lname',
        'fname',
        'mname',
        'ext',
        'birthday',
        'gender',
        'brgy',
        'city',
        'province',
        'hei_name',
        'institutional_code',
        'types_of_heis',
        'program_level_code',
        'contact_no',
        'status',
        'active'
    ];
}
