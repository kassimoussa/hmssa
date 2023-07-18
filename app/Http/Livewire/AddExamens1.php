<?php

namespace App\Http\Livewire;

use App\Models\Consultation;
use App\Models\Examens;
use App\Models\Typeex;
use Livewire\Component;

class AddExamens1 extends Component
{
    public $consultation_id, $patient_id, $medecin_id, $observations, $level; 
    public $examens, $examen_id, $examen_types, $examen_typeid, $resultats;

    public function mount($consultation_id)
    {
        $this->level = session('level');
        $this->consultation_id = $consultation_id;
        
        $consultation = Consultation::find($consultation_id);
        $this->patient_id = $consultation->patient_id;
        $this->medecin_id = $consultation->medecin_id;
        $this->observations = $consultation->observations;

        
        $this->examen_types = Typeex::orderBy('nom', 'asc')->get();

    }

    public function getExamens()
    {
        $this->examens = Examens::where('consultation_id' , $this->consultation_id)->orderBy('created_at', 'asc')->get();
    }
     
    public function close_modal()
    {
        $this->dispatchBrowserEvent('close-modal');
        $this->reset([
            'examen_typeid'
        ]); 
    }
    
    public function store()
    {
        $examen = new Examens();
        $examen->type_id = $this->examen_typeid; 
        $examen->consultation_id = $this->consultation_id;
        $examen->patient_id = $this->patient_id;
        $examen->medecin_id = $this->medecin_id;
        $query = $examen->save();

        if ($query) {
            $this->close_modal();
            $this->getExamens();
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

    public function loadid($examen_id)
    {
        $this->examen_id = $examen_id;
        $examen = Examens::find($examen_id);
        $this->resultats = $examen->resultats;
    }
    
    public function delete()
    {
        $examen = Examens::find($this->examen_id);
        $examen->delete();
        $this->getExamens();

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Suppression éffectuée avec succès!']
        );
    }

    public function render()
    {
        $this->getExamens();
        return view('livewire.add-examens1');
    }
}
