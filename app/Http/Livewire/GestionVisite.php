<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\Patient;
use App\Models\Visite;
use Carbon\Carbon;
use Livewire\Component;

class GestionVisite extends Component
{
    public $search = "";
    public $events;
    public $visites, $patients, $patient_id, $event_id, $visite_id, $nom, $nom2, $jour, $mois, $annee, $user_id, $audj, $title;

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
    
    public function getEvents()
    {
        $this->events = Event::all();
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

    public function loadids($patient_id, $event_id, $visite_id)
    {
        $this->patient_id = $patient_id;
        $this->event_id = $event_id;
        $this->visite_id = $visite_id; 

       // return dump("pid: " . $this->patient_id ." | " . "eid: " . $this->event_id ." | " . "pid: " . $this->visite_id ." ");
    }

    public function close_modal()
    {
        $this->emit("refreshCalendar");
        $this->dispatchBrowserEvent('close-modal'); 
        $this->reset([
            'nom', 'patient_id', 'search'
        ]);

    }

    public function store()
    {
        $visite = new Visite();
        $visite->user_id = $this->user_id;
        $visite->patient_id = $this->patient_id;
        $visite->date = Carbon::now();
        $query = $visite->save();

        $event = new Event();
        $event->user_id = $this->user_id;
        $event->patient_id = $this->patient_id;
        $event->date = Carbon::now();
        $event->start = Carbon::now();
        $event->end = Carbon::now();
        $event->title = $this->title;
        $event->visite_id = $visite->id;
    

        if ($query) {
            $event->save();
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
        return redirect("/patients/show/". $this->patient_id);
    } 
    
    public function show_visite()
    {
        return redirect("/visites/show/". $this->visite_id);
    }


    public function delete()
    {
        $visite = Visite::find($this->visite_id); 
        $event = Event::find($this->event_id); 
 
        $visite->delete();
        $event->delete();
        
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
        $this->getEvents();
        return view('livewire.gestion-visite');
    }
}
