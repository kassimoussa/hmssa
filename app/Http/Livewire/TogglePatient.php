<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;

class TogglePatient extends Component
{
    public $sbtn = 1;
    public $patient, $patient_id, $photo;

    public function mount($patient_id)
    {
        $this->patient_id = $patient_id;
        $this->patient = Patient::where('id', $patient_id)->first();
        $this->photo = $this->patient->storage_path
            ? $this->patient->storage_path
            : 'https://ui-avatars.com/api/?size=235&name=' . $this->patient->nom;
    }

    public function focus($i)
    {
        $this->sbtn = $i;
    }


    public function render()
    {
        return view('livewire.toggle-patient');
    }
}
