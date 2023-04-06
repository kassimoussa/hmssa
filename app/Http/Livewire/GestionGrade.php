<?php

namespace App\Http\Livewire;

use App\Models\Grade;
use Livewire\Component;

class GestionGrade extends Component
{
    public $search = "";
    public $grades, $grade_id, $nom, $categorie;

    protected $rules = [
        'nom' => 'required|unique:grades', 
    ];

    protected $messages = [
        'nom.unique' => 'Ce grade existe déja dans la base de données !', 
    ];

    public function getGrades()
    {
        $search = $this->search ;
        $this->grades = Grade::Where(function ($query) use ($search) {
            $query->where('categorie', 'Like', '%' . $search . '%') 
                ->orWhere('nom', 'Like', '%' . $search . '%') ;
        })
            ->orderBy("id", "asc")
            ->get();
    }

    
    public function close_modal()
    {
        $this->reset([
            'grade_id', 'nom', 'categorie'
        ]); 
    }

    public function store()
    {
        $grade = new Grade();
        $grade->nom = $this->nom; 
        $grade->categorie = $this->categorie; 
        $query = $grade->save();

        if ($query) {
            $this->close_modal();
            $this->getGrades();
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

    public function loadid($grade_id)
    {
        $this->grade_id = $grade_id;
        $grade = Grade::find($grade_id);
        $this->nom = $grade->nom; 
        $this->categorie = $grade->categorie; 
    }

    
    public function update()
    {
        $grade = Grade::find($this->grade_id);
        $query = $grade->update([
            'nom' => $this->nom,
            'categorie' => $this->categorie,
        ]);
        if ($query) { 
            $this->close_modal();
            $this->getGrades();
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
        $grade = Grade::find($this->grade_id);
        $grade->delete();
        $this->getGrades();

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Suppression éffectuée avec succès!']
        );
    }

    public function render()
    {
        $this->getGrades();
        return view('livewire.gestion-grade');
    }
}
