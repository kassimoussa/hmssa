<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;

class FichePatient extends Component
{
    public $patient, $patient_id, $photo, $nom, $sexe, $gp_sanguin, $adresse, $matricule, $affiliation, $telephone, $lieu_naissance, $date_naissance;

    public function mount($patient_id)
    { 
        $this->patient_id = $patient_id;
    }

    public function patientInfo()
    {
        $this->patient = Patient::where('id', $this->patient_id)->first();
        $this->photo = $this->patient->storage_path
            ? $this->patient->storage_path
            : 'https://ui-avatars.com/api/?size=235&name=' . $this->patient->nom;

        $this->nom = $this->patient->nom;
        $this->sexe = $this->patient->sexe;
        $this->gp_sanguin = $this->patient->gp_sanguin;
        $this->matricule = $this->patient->matricule;
        $this->affiliation = $this->patient->affiliation;
        $this->telephone = $this->patient->telephone;
        $this->lieu_naissance = $this->patient->lieu_naissance;
        $this->date_naissance = $this->patient->date_naissance;
        $this->adresse = $this->patient->adresse;
    }

    

    public function update()
    {
        $patient = Patient::find($this->patient_id);

        $query = $patient->update([
            'nom' => $this->nom,
            'matricule' => $this->matricule,
            'sexe' => $this->sexe,
            'gp_sanguin' => $this->gp_sanguin,
            'adresse' => $this->adresse,
            'affiliation' => $this->affiliation,
            'telephone' => $this->telephone,
            'lieu_naissance' => $this->lieu_naissance, 
            'date_naissance' => $this->date_naissance,
        ]);

        if ($query) { 
            $this->patientInfo();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Modification réussi!']
            );
            $this->dispatchBrowserEvent('close-modal');
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => "Erreur lors de l'ajout!"]
            );
            $this->dispatchBrowserEvent('close-modal');
        }
    }

    public function render()
    {
        $this->patientInfo();
        return view('livewire.fiche-patient');
    }
}
