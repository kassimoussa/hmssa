<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Visite;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(){
        $level = session('level');
        return view($level.'.patients.index');
    }

    public function show($patient) {
        $level = session('level');
        $patient_id = $patient;

        return view($level.'.patients.show', compact('patient_id'));

    }
}
