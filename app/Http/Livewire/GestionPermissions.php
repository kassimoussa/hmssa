<?php

namespace App\Http\Livewire;

use App\Models\Permissions;
use Livewire\Component;

class GestionPermissions extends Component
{
    public $search = "";
    public $permissions, $permission_id, $groupe, $description, $nom;

    public function getPermissions()
    {
        $search = $this->search ;
        $this->permissions = Permissions::where('nom', 'Like', '%' . $search . '%')
            ->orderBy("id", "asc")
            ->get();
    }

    public function close_modal()
    {
        $this->reset([
            'permission_id', 'groupe', 'nom', 'description'
        ]); 
    }

    public function store()
    {
        $permission = new Permissions();
        $permission->groupe = $this->groupe; 
        $permission->description = $this->description; 
        $permission->nom = $this->nom; 
        $query = $permission->save();

        if ($query) {
            $this->close_modal();
            $this->getPermissions();
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

    public function loadid($permission_id)
    {
        $this->permission_id = $permission_id;
        $permission = Permissions::find($permission_id);
        $this->groupe = $permission->groupe; 
        $this->description = $permission->description; 
        $this->nom = $permission->nom; 
    }

    
    public function update()
    {
        $permission = Permissions::find($this->permission_id);
        $query = $permission->update([
            'nom' => $this->nom,
            'groupe' => $this->groupe,
            'description' => $this->description,
        ]);
        if ($query) { 
            $this->close_modal();
            $this->getPermissions();
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
        $permission = Permissions::find($this->permission_id);
        $permission->users()->detach();
        $permission->delete();
        $this->getPermissions();

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Suppression éffectuée avec succès!']
        );
    }


    public function render()
    {
        $this->getPermissions();
        return view('livewire.gestion-permissions');
    }
}
