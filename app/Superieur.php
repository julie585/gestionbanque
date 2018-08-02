<?php

namespace App;

use App\Notifications\SuperieurResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Superieur extends Authenticatable
{
    use Notifiable;
    protected $guard = "superieur";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'code','age', 'email', 'datenaiss','prenom','password',
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
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new SuperieurResetPassword($token));
    }

    public function employes()
    {
        $this->belongsTo('App\Employe');
    }




}
