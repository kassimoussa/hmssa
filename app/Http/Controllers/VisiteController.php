<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Visite;
use Illuminate\Http\Request;

class VisiteController extends Controller
{
    public function index(){
        return view('1.visites.index');
    }

    
    public function events()
    {
        $events = Event::all();

        return $events;
    }

    public function show($visite_id)
    {
        $visite = Visite::with('patient')->where('id', $visite_id)->first();

        return view('1.visites.show', compact('visite'));

        //return dd($visite);
    }
}
