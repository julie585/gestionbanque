<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Client extends Authenticatable
{

    use HasApiTokens, Notifiable;
    protected $guarded = ['id'];
    protected $table = 'client';


    public function comptecourants()
    {
        $this->hasOne('Comptecourant');
    }

    public function compteepargnes()
    {
        $this->hasOne('Compteepargne');
    }

    public function virement()
    {
        $this->hasMany('Virement');
    }

}
