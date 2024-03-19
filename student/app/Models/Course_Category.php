<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_Category extends Model
{
    use HasFactory;
    protected $table = 'course_category';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'course_category',
        'status',
        'cate_logo',
        'course_type',
        'del_status',
        'created_at',
        'updated_at',
    ];
}

