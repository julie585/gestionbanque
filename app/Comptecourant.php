<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comptecourant extends Model
{
    protected $table = 'comptecourant';
    protected $guarded = ['id'];
    public function clients()
    {
        $this->belongsTo('Client');
    }

    public function versements()
    {
        $this->hasMany('Versement');
    }

    public function retraits()
    {
        $this->hasMany('Retrait');
    }

    public function virement()
    {
        $this->hasMany('App\Virement');
    }
}
