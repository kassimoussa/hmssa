<?php

namespace App\Http\Livewire;

use App\Models\Typera;
use Carbon\Carbon;
use Livewire\Component;

class GestionRadiosType extends Component
{
    public $types, $search, $type_id, $user_id, $nom, $nom2, $description, $description2;

    public function mount()
    {
        $this->user_id = session('id');
    }

    public function getTypes()
    {
        $search = $this->search ;

        $this->types = Typera::Where(function ($query) use ($search) {
            $query->where('nom', 'Like', '%' . $search . '%')
                ->orWhere('description', 'Like', '%' . $search . '%') ;
        })->orderBy("nom", "asc")->get();
    }
     
    public function close_modal()
    {
        $this->dispatchBrowserEvent('close-modal');
        $this->reset([
            'nom', 'description',
            'nom2', 'description2',
        ]); 
    }
    
    public function store()
    {
        $type = new Typera();
        $type->nom = $this->nom; 
        $type->description = $this->description;
        $query = $type->save();

        if ($query) {
            $this->close_modal();
            $this->getTypes();
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

    public function loadid($type_id)
    {
        $this->type_id = $type_id;
        $type = Typera::find($type_id);
        $this->nom2 = $type->nom; 
        $this->description2 = $type->description; 
    }

    
    public function update()
    {
        $type = Typera::find($this->type_id);
        $query = $type->update([
            'nom' => $this->nom2,
            'description' => $this->description2,
        ]);
        if ($query) { 
            $this->close_modal();
            $this->getTypes();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Modification réussi!']
            );
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => "Erreur lors de l'ajout!"]
            );
        }
    }
    
    public function delete()
    {
        $type = Typera::find($this->type_id);
        $type->delete();
        $this->getTypes();

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Suppression éffectuée avec succès!']
        );
    }
    
    public function render()
    {
        $this->getTypes();
        return view('livewire.gestion-radios-type');
    }
}
