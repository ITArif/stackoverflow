<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //answer and comment er relation
    public function answer(){
        return $this->belongsTo('App\Answer','answer_id');
    }
    //comment r user er relationship
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
