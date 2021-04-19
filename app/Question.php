<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    //er mane oi je amra migration krar time soft_delete kta entity neci ota page theke kichu delete krleow database theke delete hoy na
    use SoftDeletes;
    //many to many relationship
    public function tags(){
        return $this->belongsToMany('App\Tag','question_tags','question_id','tag_id')
            ->withTimestamps();
    }
    //question er sathee category er relationshiop
    //one to many relationship
    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }
    //user r question er relationship
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    //jedike 1 ase tai question a 1 ase tai hasmany
    public function answers(){
        return $this->hasMany('App\Answer','question_id','id');
    }
    //vote er
    public  function votes(){
        return $this->hasMany('App\Vote','question_id','id');
    }

}
