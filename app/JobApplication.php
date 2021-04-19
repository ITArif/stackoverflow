<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    //
    protected $table = "user_jobs";
    protected $fillable  = [
        'user_id','job_id','name','email','phone','company_name','linkedin','github','full_form','get_post','resume','type','status'
    ];
}
