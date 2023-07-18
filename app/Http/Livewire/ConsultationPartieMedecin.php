<?php

namespace App\Http\Livewire;

use App\Models\Consultation;
use App\Models\Examens;
use App\Models\Radio;
use App\Models\Typeex;
use App\Models\Typera;
use Livewire\Component;

class ConsultationPartieMedecin extends Component
{
    public $consid ;
    public $sbtn = 1; 

    public function mount($consultation_id)
    {
        $this->consid = $consultation_id; 
    }

    public function focus($i)
    {
        $this->sbtn = $i;
    }
 
    public function render()
    { 
        return view('livewire.consultation-partie-medecin');
    }
}
