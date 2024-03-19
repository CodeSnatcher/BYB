<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEduHistory extends Model
{
    use HasFactory;
    protected $table = 'edu_history';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'stu_id',
        'country_of_edu',
        'highest_level_of_edu',
        'grading_scheme',
        'graduated_from',
        'status',
        'del_status',
        'created_at',
        'updated_at',
     
       
        
    ];

    public $timestamps = true;
}
