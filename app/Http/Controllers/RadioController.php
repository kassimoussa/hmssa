<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RadioController extends Controller
{
    public function index(){
        $level = session('level');
        return view($level.'.radiologie.index');
    }
}
