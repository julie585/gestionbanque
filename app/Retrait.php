<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retrait extends Model
{
    protected $guarded = ['id'];
    protected $table = 'retrait';
    public function comptecourants()
    {
        $this->belongsTo('App\Comptecourant');
    }

    public function compteepargnes()
    {
        $this->belongsTo('App\Compteepargne');
    }
}
