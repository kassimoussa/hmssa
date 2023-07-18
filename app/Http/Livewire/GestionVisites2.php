<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\Patient;
use App\Models\Visite;
use Carbon\Carbon;

class GestionVisites2 extends Component
{
    public $search = "";
    public $visites, $patients, $patient_id, $consultation_id, $visite_id, $nom, $nom2, $jour, $mois, $annee, $user_id, $audj, $title, $status;

    public function mount()
    {
        $this->audj = Carbon::today()->format('Y-m-d');
        $this->jour = Carbon::today()->format('d');
        $this->mois = Carbon::now()->format('m');
        $this->annee = Carbon::now()->format('Y');
        $this->user_id = session('id');
        $this->visites = Visite::with('patient')->orderBy("date", "asc")->get();
    }

    public function getVisites()
    {
        /* $search = $this->search;
        $this->visites = Visite::whereHas('patient', function ($query) {
            $query->where('matricule', 'Like', '%' . $this->search . '%')
                ->orWhere('nom', 'Like', '%' . $this->search . '%')
                ->orWhere('telephone', 'Like', '%' . $this->search . '%')
                ->orWhere('sexe', 'Like', '%' . $this->search . '%')
                ->orWhere('affiliation', 'Like', '%' . $this->search . '%');
        })->orderBy("created_at", "asc")
            ->get(); */

        $this->visites = Visite::with('patient')->orderBy("date", "asc")->get();
    }


    public function getPatients()
    {
        if (strlen($this->search) >= 2) {
            $search = $this->search;
            $this->patients = Patient::Where(function ($query) use ($search) {
                $query->where('matricule', 'Like', '%' . $search . '%')
                    ->orWhere('nom', 'Like', '%' . $search . '%')
                    ->orWhere('telephone', 'Like', '%' . $search . '%')
                    ->orWhere('sexe', 'Like', '%' . $search . '%')
                    ->orWhere('affiliation', 'Like', '%' . $search . '%');
            })->orderBy("created_at", "asc")
                ->get();
        }
    }

    public function loadpid($patient_id)
    {
        $this->patient_id = $patient_id;
        $patient = Patient::find($patient_id);
        $this->search = $patient->nom;
        $this->title = $patient->nom;
    }

    public function loadids($patient_id, $visite_id, $status)
    {   
        $visite = Visite::find($visite_id); 
        $this->patient_id = $patient_id; 
        $this->visite_id = $visite_id;
        $this->status = $status; 
        $this->consultation_id = $visite->consultation_id; 
        $this->dispatchBrowserEvent('eventAction');
        //dump($status);
        // return dump("pid: " . $this->patient_id ." | " . "eid: " . $this->event_id ." | " . "pid: " . $this->visite_id ." ");
    }

    public function close_modal()
    {
        $this->emit("refreshCalendar");
        $this->dispatchBrowserEvent('close-modal');
        $this->reset([
            'nom', 'patient_id', 'search', 'status','consultation_id'
        ]);
    }

    public function refreshCal()
    {
        $this->emit("refreshCalendar");
    }

    public function store()
    {
        $visite = new Visite();
        $visite->user_id = $this->user_id;
        $visite->patient_id = $this->patient_id;
        $visite->date = Carbon::now();
        $visite->start = Carbon::now();
        $visite->end = Carbon::now();
        $visite->title = $this->title; 
        $query = $visite->save();


        if ($query) { 
            $this->close_modal();
            $this->getVisites();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Ajout réussi!']
            );
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => "Erreur lors de l'ajout!"]
            );
        }
    }

    public function show_patient()
    {
        return redirect("/patients/show/" . $this->patient_id);
    }

    public function show_visite()
    {
        return redirect("/visites/show/" . $this->visite_id);
    }

    public function show_consultation()
    { 
        return redirect("/visites/consultation/" . $this->consultation_id);
    }


    public function delete()
    {
        $visite = Visite::find($this->visite_id); 

        $visite->delete(); 

        $this->close_modal();

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Suppression éffectuée avec succès!']
        );
    }

    public function render()
    {
        $this->getVisites();
        $this->getPatients(); 
        return view('livewire.gestion-visites2');
    }
}


