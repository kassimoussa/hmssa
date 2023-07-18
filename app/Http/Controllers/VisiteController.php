<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Event;
use App\Models\User;
use App\Models\Visite;
use Illuminate\Http\Request;

class VisiteController extends Controller
{
    public function index(){
        $level = session('level');
        return view($level.'.visites.index');
    }

    
    public function events()
    {
        $events = Visite::all();

        return $events;
    }

    public function show($visite_id)
    {
        $level = session('level');
        $visite = Visite::with('patient')->where('id', $visite_id)->first();
        $medecins = User::where('fonction_id', 1)->get();

        return view($level.'.visites.create', compact('visite', 'medecins'));

        //return dd($visite);
    }

    public function store(Request $request)
    {
        $user_id = session('id');
        $visite_id = $request->visite_id;

        $consultation = new Consultation();
        $consultation->patient_id = $request->patient_id;
        $consultation->infirmier_id = $user_id;
        $consultation->medecin_id = $request->medecin_id;
        $consultation->date = now();
        $consultation->motif = $request->motif;
        $consultation->tension = $request->tension;
        $consultation->temperature = $request->temperature;
        $consultation->spo2 = $request->spo2;
        $consultation->glycemie = $request->glycemie;
        $consultation->poids = $request->poids;
        $consultation->taille = $request->taille;
        $consultation->observations = $request->observations;

        $query = $consultation->save();
        
        $visite = Visite::find($visite_id);
        
        if ($query) {
            $visite->update(['consultation_id' => $consultation->id, 'color' => "#378006", 'status' => "OUI"]);
            return redirect('/visites')->with('success', 'Ajout réussi');
        } else {
            return back()->with('fail', 'Echec de l\'ajout ');
        }
    }

    public function consultation($id)
    {
        $level = session('level');
        $consultation = Consultation::with(['patient', 'infirmier', 'medecin'])->find($id);
        $medecins = User::where('fonction_id', 1)->get();

       return view($level.'.visites.consultation', compact('consultation'));

        //return dd($consultation);
    }


}
