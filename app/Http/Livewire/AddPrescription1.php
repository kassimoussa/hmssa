<?php

namespace App\Http\Livewire;

use App\Models\Consultation;
use App\Models\Medicament;
use App\Models\Prescription;
use Livewire\Component;

class AddPrescription1 extends Component
{
    public $search = "";
    public $consultation_id, $medicament_id, $patient_id, $medecin_id, $pharmacien_id, $quantite, $dose, $frequence_admin, $duree, $level;
    
    public $prescriptions, $prescription_id, $medicaments, $medicament_id2, $quantite2, $dose2, $frequence_admin2, $duree2;

    public function mount($consultation_id)
    {
        $this->level = session('level'); 
        $this->consultation_id = $consultation_id;
        
        $consultation = Consultation::find($consultation_id);
        $this->patient_id = $consultation->patient_id;
        $this->medecin_id = $consultation->medecin_id; 

        //$this->medicaments = Medicament::orderBy('nom', 'asc')->get();

    }

    public function getPrescriptions()
    {
        $this->prescriptions = Prescription::where('consultation_id' , $this->consultation_id)->orderBy('created_at', 'asc')->get();
    }

    public function getMedicaments()
    {
        if (strlen($this->search) >= 2) {
            $search = $this->search;
            $this->medicaments = Medicament::Where(function ($query) use ($search) {
                $query->where('nom', 'Like', $search . '%') ;
            })->orderBy("nom", "asc")
                ->take(10)->get();
        }
    }

     
    public function close_modal()
    {
        $this->dispatchBrowserEvent('close-modal');
        $this->reset([
            'prescription_id', 'medicament_id', 'medicament_id2', 'quantite', 'quantite2', 'dose', 'dose2', 'frequence_admin', 'frequence_admin2', 'duree', 'duree2', 
        ]); 
    }

    public function loadmid($medicament_id)
    {
        $this->medicament_id = $medicament_id; 
    }
    
    public function loadid($prescription_id)
    {
        $this->prescription_id = $prescription_id;
        $prescription = Prescription::find($prescription_id);
        $this->medicament_id2 = $prescription->medicament_id;
        $this->quantite2 = $prescription->quantite;
        $this->dose2 = $prescription->dose;
        $this->frequence_admin2 = $prescription->frequence_admin;
        $this->duree2 = $prescription->duree;
    }
  
    public function store()
    {
        $prescription = new Prescription();
        $prescription->medicament_id = $this->medicament_id; 
        $prescription->consultation_id = $this->consultation_id;
        $prescription->patient_id = $this->patient_id;
        $prescription->medecin_id = $this->medecin_id;
        $prescription->quantite = $this->quantite;
        $prescription->dose = $this->dose;
        $prescription->frequence_admin = $this->frequence_admin;
        $prescription->duree = $this->duree;
        $query = $prescription->save();

        if ($query) {
            $this->close_modal();
            $this->getPrescriptions();
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
    
    public function delete()
    {
        $prescription = Prescription::find($this->prescription_id);
        $prescription->delete();
        $this->getPrescriptions();

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Suppression éffectuée avec succès!']
        );
    }

    public function render()
    {
        $this->getPrescriptions(); 
        $this->getMedicaments();
        return view('livewire.add-prescription1');
    }
}
