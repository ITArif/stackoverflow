<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Job extends Model
{
    protected $hidden = ['pivot'];

    /*Many To many relationship*/
    public function users(){
        return $this->belongsToMany('App\User','user_jobs','job_id','user_id')
            ->withTimestamps();
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'job_tags','job_id','tag_id')
            ->withTimestamps();
    }
    //for like er jonno new
    public function likes(){
        return $this->hasMany('App\Like');
    }
    public function applications(){
        return $this->hasMany('App\JobApplication');
    }

    public function userApplication(){
        return JobApplication::where('job_id', $this->id)->where('user_id', Auth::id())->first();
    }
}
