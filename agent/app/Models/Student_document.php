<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_document extends Model
{
    use HasFactory;
    protected $table = 'student_document';
    protected $primaryKey = 'id';
    protected $fillable = [
        	'id',
			'global_url',	
			'stu_id',
			'crs_id',
			'uni_id',
        	'certificate_10',	
        	'certificate_12',	
        	'certificate_other',
            'status',	
        	'del_status',	
        	'created_at',	
    ];
}

