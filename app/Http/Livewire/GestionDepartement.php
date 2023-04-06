<?php

namespace App\Http\Livewire;

use App\Models\Departement;
use Livewire\Component;

class GestionDepartement extends Component
{
    public $search = "";
    public $departements, $departement_id, $nom;

    protected $rules = [
        'nom' => 'required|unique:departements', 
    ];

    protected $messages = [
        'nom.unique' => 'Ce departement existe déja dans la base de données !', 
    ];

    public function getDepartements()
    {
        $search = $this->search ;
        $this->departements = Departement::where('nom', 'Like', '%' . $search . '%')
            ->orderBy("nom", "asc")
            ->get();
    }

    
    public function close_modal()
    {
        $this->reset([
            'departement_id', 'nom'
        ]); 
    }

    public function store()
    {
        $departement = new Departement();
        $departement->nom = $this->nom; 
        $query = $departement->save();

        if ($query) {
            $this->close_modal();
            $this->getDepartements();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Ajout réussi!']
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

    public function loadid($departement_id)
    {
        $this->departement_id = $departement_id;
        $departement = Departement::find($departement_id);
        $this->nom = $departement->nom; 
    }

    
    public function update()
    {
        $departement = Departement::find($this->departement_id);
        $query = $departement->update([
            'nom' => $this->nom,
        ]);
        if ($query) { 
            $this->close_modal();
            $this->getDepartements();
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

    

    public function delete()
    {
        $departement = Departement::find($this->departement_id);
        $departement->delete();
        $this->getDepartements();

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Suppression éffectuée avec succès!']
        );
    }

    public function render()
    {
        $this->getDepartements();
        return view('livewire.gestion-departement');
    }
}
