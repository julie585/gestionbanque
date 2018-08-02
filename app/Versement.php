<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Versement extends Model
{
    protected $guarded = ['id'];
    protected $table ='versement';
    public function comptecourants()
    {
        $this->belongsTo('App\Comptecourant');
    }

    public function compteepargnes()
    {
        $this->belongsTo('App\Compteepargne');
    }
}
