<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentTable extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'student_id',
        'comment'
    ];
}
