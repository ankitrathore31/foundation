<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NgoController extends Controller
{
    public function Ngo(){
        return view('ngo.dashboard');
    }
}
