<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    public function index( ) {

        return view("1.personnels.index");
    }

    public function create(){

        return view("1.personnels.create");
    }
}
