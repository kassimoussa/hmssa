<?php

namespace App\Http\Livewire;

use App\Models\Consultation;
use App\Models\Patient;
use Livewire\Component;

class ConsultationsPatient extends Component
{
    public $patient, $patient_id, $photo, $consultations;

    public function mount($patient_id)
    {
        $this->patient_id = $patient_id;
        $this->patient = Patient::where('id', $patient_id)->first();
        $this->photo = $this->patient->storage_path
            ? $this->patient->storage_path
            : 'https://ui-avatars.com/api/?size=235&name=' . $this->patient->nom;
            
        $this->consultations = Consultation::where('patient_id', $patient_id)->orderBy('created_at', 'desc')->get();

    }
    public function render()
    {
        return view('livewire.consultations-patient');
    }
}
