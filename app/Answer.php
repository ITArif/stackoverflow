<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Answer extends Model
{
    public function question(){
        return $this->belongsTo('App\Question','question_id');
    }
    public function questions(){
        return $this->belongsTo(Question::class,'question_id');
    }
    //answer and user er mordhee relation
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    //answer and comment er relation
    public function comments(){
        return $this->hasMany('App\Comment','answer_id','id');
    }
    /**
     *
     */
    public function getRating(){
        return Rating::where("answer_id", $this->id)->avg("amount");
    }
    /**
     * Has the current logged in user rated this answer or not
     * Returns Boolean
     */
    public function userHasRated(){
        return (boolean) Rating::where("user_id", Auth::id())->where("answer_id", $this->id)->count();
    }
}
