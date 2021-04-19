<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    ////user r question er relationship
    //jedike 1 ase tai question a 1 ase tai hasmany
    public function questions(){
        return $this->hasMany('App\Question','user_id','id');
    }
    //answer and user er mordhee relation
    public function answers(){
        return $this->hasMany('App\Answer','user_id','id');
    }
    //user r comment er relationship
    public function comment(){
        return $this->hasMany('App\Comment','user_id','id');
    }
    //vote er
    public function vote(){
        return $this->hasOne('App\Vote','user_id','id');
    }

    /*many To many RelationShip*/
    public function jobs(){
        return $this->belongsToMany(Job::class,'user_jobs','user_id','job_id')
            ->withTimestamps();
    }

    //for like er jonno
    public function likes(){
        return $this->hasMany('App\Like');
    }
    public function getRating()
    {
        //find the answers
        $answers = $this->answers()->get();
        $count = $answers->count();

        if($count <= 0){
            return 0;
        }


        // find average rating of the answers

        //add all rating recieved
        $totalRating = 0;
        foreach ($answers as $index => $answer){
            $totalRating += $answer->getRating();
        }

        return $totalRating/$count;
    }


    public function frofiles(){
        return $this->hasMany(Profile::class,'user_id','id');
    }
}
