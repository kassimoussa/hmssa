<?php

namespace App\Http\Livewire;

use App\Models\Fonction;
use Livewire\Component;

class GestionFonction extends Component
{
    public $search = "";
    public $fonctions, $fonction_id, $nom;

    protected $rules = [
        'nom' => 'required|unique:fonctions', 
    ];

    protected $messages = [
        'nom.unique' => 'Cette fonction existe déja dans la base de données !', 
    ];

    public function getFonctions()
    {
        $search = $this->search ;
        $this->fonctions = Fonction::where('nom', 'Like', '%' . $search . '%')
            ->orderBy("nom", "asc")
            ->get();
    }

    
    public function close_modal()
    {
        $this->reset([
            'fonction_id', 'nom'
        ]); 
    }

    public function store()
    {
        $fonction = new Fonction();
        $fonction->nom = $this->nom; 
        $query = $fonction->save();

        if ($query) {
            $this->close_modal();
            $this->getFonctions();
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

    public function loadid($fonction_id)
    {
        $this->fonction_id = $fonction_id;
        $fonction = Fonction::find($fonction_id);
        $this->nom = $fonction->nom; 
    }

    
    public function update()
    {
        $fonction = Fonction::find($this->fonction_id);
        $query = $fonction->update([
            'nom' => $this->nom,
        ]);
        if ($query) { 
            $this->close_modal();
            $this->getFonctions();
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
        $fonction = Fonction::find($this->fonction_id);
        $fonction->delete();
        $this->getFonctions();

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Suppression éffectuée avec succès!']
        );
    }

    public function render()
    {
        $this->getFonctions();
        return view('livewire.gestion-fonction');
    }
}
