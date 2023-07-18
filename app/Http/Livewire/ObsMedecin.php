<?php

namespace App\Http\Livewire;

use App\Models\Consultation;
use Livewire\Component;

class ObsMedecin extends Component
{
    public $consultation_id, $patient_id, $medecin_id, $observations, $level;

    public function mount($consultation_id)
    {
        $this->level = session('level');
        $this->consultation_id = $consultation_id;
        
        $consultation = Consultation::find($consultation_id);
        $this->observations = $consultation->observations; 
    }
    
    public function store()
    {
        $consultation = Consultation::find($this->consultation_id);

        $query = $consultation->update([
            'observations' => $this->observations,
        ]);
        
        if ($query) {
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

    public function render()
    {
        return view('livewire.obs-medecin');
    }
}

