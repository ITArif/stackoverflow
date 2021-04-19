<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //question er sathee category er relationshiop
    //one to many relationship
    public function question(){
        return $this->hasMany('App\Question','category_id','id');
    }
}
