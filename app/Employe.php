<?php

namespace App;

use App\Notifications\EmployeResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employe extends Authenticatable
{
    use Notifiable;
    protected $guard = "employe";
    protected $table = "employes";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'code','age', 'email', 'datenaiss','prenom','password','superieurs_id',
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
        $this->notify(new EmployeResetPassword($token));
    }

    public function superieurs()
    {
        $this->hasOne('App\Superieur');
    }

    public function groupes()
    {
        $this->belongsToMany('App\Groupe');
    }
}
