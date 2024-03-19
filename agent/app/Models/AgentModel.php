<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class AgentModel extends Model

{

    use HasFactory;

    protected $table = 'agents';

    protected $fillable = [

        'id',
        
        'agent_id',

        'agent_type',

        'first_name',

        'last_name',

        'business_certificate',

        'business_logo',

        'email',

        'password',

        'phone_no',

        'contact_method',

        'find_out',

        'reference',

        'recruiting_year',

        'source_country',

        'services',

        'created_at',

        'del_status',

        'status',

        

    ];

}



	

