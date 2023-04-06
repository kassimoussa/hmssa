<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Visite;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(){
        return view('1.patients.index');
    }

    public function show($patient) {
        $patient_id = $patient;

        return view('1.patients.show', compact('patient_id'));

    }
}
