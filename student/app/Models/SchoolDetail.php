<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolDetail extends Model
{
    use HasFactory;
    protected $table = 'student_school_info';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'stu_id',
        'country_of_inst' ,
        'name_of_inst' ,
        'level_of_edu',
        'primary_lang_instruct',
        'attended_inst_from',
        'attended_inst_to',
        'degree_name',
        'graduate_from_inst',
        'sch_address',
        'sch_city',
        'sch_state',
        'sch_postal_zip',
       
        'status',
        'del_status',  
        
     
        
    ];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = true;

}

	
