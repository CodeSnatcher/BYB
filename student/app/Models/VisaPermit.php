<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaPermit extends Model
{
    use HasFactory;
    protected $table = 'student_visa_study_permit';
    protected $primaryKey = 'id';
   
        protected $fillable = [
            'id',
            'stu_id',
            'refused_visa',
            'visa_you_have',
            'more_information',
          
            'status', // Add 'status' field
            'del_status', // Add 'del_status' field

            'created_at',
            'updated_at',
          

           
        ];

        public $timestamps = true;

        













        protected $dates = ['created_at', 'updated_at'];
}
