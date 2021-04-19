<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //many to many relationship
    public function questions(){
        return $this->belongsToMany('App\Question','question_tags','tag_id','question_id')
            ->withTimestamps();
    }

    public function jobs(){
        return $this->belongsToMany('App\Job','job_tags','tag_id','job_id')
            ->withTimestamps();
    }
}
