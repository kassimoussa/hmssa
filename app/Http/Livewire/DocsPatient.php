<?php

namespace App\Http\Livewire;

use App\Models\Document;
use App\Models\Patient;
use Livewire\Component;

class DocsPatient extends Component
{
    public $docs, $patient_id, $user_id, $nom, $nom2, $description, $description2, $date, $date2, $filename, $filename2,  $filename3;

    public function mount($patient_id)
    {
        $this->patient_id = $patient_id;
        $this->user_id = session('id');
    }

    public function getDocs()
    {
        $this->docs = Document::where('patient_id', $this->patient_id)->get();
    }
    
    public function close_modal()
    {
        $this->reset([
            'nom', 'description', 'date', 'filename', 'filename3'
            ,'nom2', 'description2', 'date2', 'filename2',  
        ]);
    }


    public function render()
    {
        $this->getDocs();
        return view('livewire.docs-patient');
    }
}
