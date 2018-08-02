<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compteepargne extends Model
{
    protected $guarded = ['id'];
    protected $table = 'compteepargne';
    public function clients()
    {
        $this->belongsTo('App\Client');
    }
    public function versements()
    {
        $this->hasMany('App\Versement');
    }

    public function retraits()
    {
        $this->hasMany('App\Retrait');
    }
    public function virement()
    {
        $this->hasMany('App\Virement');
    }
}
