<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaboController extends Controller
{
    public function index(){
        $level = session('level');
        return view($level.'.laboratoire.index');
    }
}
