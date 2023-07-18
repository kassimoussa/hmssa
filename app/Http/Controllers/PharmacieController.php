<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PharmacieController extends Controller
{
    public function index(){
        $level = session('level');
        return view($level.'.pharmacie.index');
    }
}
 