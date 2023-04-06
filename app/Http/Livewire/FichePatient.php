<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;

class FichePatient extends Component
{
    public $patient, $patient_id, $photo;

    public function mount($patient_id)
    {
        $this->patient_id = $patient_id;
        $this->patient = Patient::where('id', $patient_id)->first();
        $this->photo = $this->patient->storage_path
            ? $this->patient->storage_path
            : 'https://ui-avatars.com/api/?size=235&name=' . $this->patient->nom;
    }

    public function render()
    {
        return view('livewire.fiche-patient');
    }
}
