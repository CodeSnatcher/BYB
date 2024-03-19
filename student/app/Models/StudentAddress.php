<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAddress extends Model
{
    use HasFactory;
    protected $table = 'student_address';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'stu_id',
        'address',
        'city_town',
        'country',
        'province_state',
        'postal_code',
        'email',
        'phone_num',
        'status',
        'del_status',
        'created_at',
        'updated_at',
        
    ];

    public $timestamps = true;
}

