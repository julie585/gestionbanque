<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $guarded = ['id'];
    public function employes()
    {
        $this->belongsToMany('App\Employe');
    }
}
