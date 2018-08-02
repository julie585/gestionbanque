<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Virement extends Model
{
    protected $guarded = ['id'];
    protected $table = 'virement';

    public function clients()
    {
        $this->belongsTo('App\Client');
    }
    public function epargne()
    {
        $this->belongsTo('App\Compteepargne');
    }
    public function courant()
    {
        $this->belongsTo('App\Comptecourant');
    }

}
