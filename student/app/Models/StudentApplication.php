<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentApplication extends Model
{
    use HasFactory;
    protected $table = 'student_application';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'stu_id',
        'uni_id',
        'course_id',
        'status',
        'del_status',
        'created_at',
    ];
}

