<?php

namespace App\Http\Livewire;

use App\Models\Medicament;
use App\Models\Prescription;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class GestionPrescriptions extends Component
{
    public $prescriptions, $prescription_id,  $search, $quantite, $old_quantite;


    public function getPrescriptions()
    { 
        $search = $this->search;

        $this->prescriptions = Prescription::whereHas('medicament', function (Builder $query) use ($search) {
                $query->where('nom', 'Like', '%' . $search . '%') ;
            })
            ->orWhereHas('patient', function (Builder $query) use ($search) {
                $query->where('nom', 'Like', '%' . $search . '%')
                    ->orWhere('matricule', 'Like', '%' . $search . '%');
            })
            ->orWhereHas('medecin', function (Builder $query) use ($search) {
                $query->where('nom', 'Like', '%' . $search . '%')
                    ->orWhere('matricule', 'Like', '%' . $search . '%');
            })
            ->orWhereHas('pharmacien', function (Builder $query) use ($search) {
                $query->where('nom', 'Like', '%' . $search . '%')
                    ->orWhere('matricule', 'Like', '%' . $search . '%');
            })
            ->orWhereHas('consultation', function (Builder $query) use ($search) {
                $query->where('date', 'Like', '%' . $search . '%');
            })
            ->orderBy("created_at", "desc")->get();
    }

    public function close_modal()
    {
        $this->dispatchBrowserEvent('close-modal');
        $this->reset([
            'prescription_id', 
        ]);
    }

    public function loadid($prescription_id)
    {
        $this->prescription_id = $prescription_id;
        $prescription = Prescription::find($prescription_id); 
        $this->quantite = $prescription->quantite;
    }
    
    public function remplir($prescription_id)
    {
        $prescription = Prescription::find($prescription_id);
        $quantite = $prescription->quantite;

        $medicament_id = $prescription->medicament_id;
        $medicament = Medicament::find($medicament_id);
        $this->old_quantite = $medicament->quantite;

        $query = $prescription->update([
            'status' => "OUI",
        ]);


        if ($query) {
            $medicament->update([ 'quantite' => $this->old_quantite - $this->quantite ]);
            
            $this->getPrescriptions();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Prescription remplie !']
            ); 
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => "Erreur lors du remplissage de la prescription !"]
            ); 
        }
    }

    public function render()
    {
        $this->getPrescriptions();
        return view('livewire.gestion-prescriptions');
    }
}
