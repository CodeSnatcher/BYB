<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission_model extends Model
{
    use HasFactory;
    protected $table = 'commissions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'agent_id',
        'stu_id',
        'uni_id',
        'course_id',
        'paid_amount',
        'commission',
        'status',
        'del_status',
        'created_at',
    ];
}

