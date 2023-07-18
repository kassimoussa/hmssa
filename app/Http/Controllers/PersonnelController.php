<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    public function index( ) {
        $level = session('level');
        return view($level.'.personnels.index');
    }

    public function create(){
        $level = session('level');
        return view($level.'.personnels.create');
    }
}
