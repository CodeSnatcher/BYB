<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEligibilityModel extends Model
{
    use HasFactory;
    protected $table = 'student_eligibility';
    protected $primaryKey = 'id';
    protected $fillable = [
        	'id',	
			'stu_id',
        	'study_country',	
        	'high_edu_level',	
        	'apply_education_cat',	
        	'study_start_date',	
        	'yearly_tuition_budget',
        	'apply_education_level',	
        	'degree',		
        	'english_proficiency',
        	'is_deleted',	
        	'status',
        	'created_at',	
    ];
}

