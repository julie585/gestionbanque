<?php

namespace App\Http\Controllers;

use App\Superieur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class InscriptionController extends Controller
{
    public function contact(){

        Mail::send('email.contact',['username' => 'test'], function ($message){
            $message->to('bbbb@gmqil.com')->subject('CSSSS');
        });

    }
}
