<?php

namespace App;

use App\Notifications\AdminResetNotification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    //use SoftDeletes;

    protected $hidden = ['password','remember_token'];

    public function permissions(){
        return $this->belongsToMany(Permission::class,'admin_permission','admin_id','permission_id');
    }

    /**
     * Override from CanResetPassword Trait
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetNotification($token));
    }
}
