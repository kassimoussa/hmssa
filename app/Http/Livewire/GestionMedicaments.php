<?php

namespace App\Http\Livewire;

use App\Models\Medicament;
use Livewire\Component;
use Livewire\WithPagination;

class GestionMedicaments extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public /* $medicaments,  */$medicament_id, $code, $nom, $forme, $administration, $description, $producteur,
        $code2, $nom2, $forme2, $administration2, $description2, $producteur2, $user_id, $search;


    public function mount()
    {
        $this->user_id = session('id');
    }

   /*  public function getMedicaments()
    {
        $search = $this->search ;

        $this->medicaments = Medicament::Where(function ($query) use ($search) {
            $query->where('nom', 'Like', '%' . $search . '%')
                ->orWhere('forme', 'Like', '%' . $search . '%')
                ->orWhere('administration', 'Like', '%' . $search . '%')
                ->orWhere('producteur', 'Like', '%' . $search . '%') ;
        })->orderBy("nom", "asc")->paginate(10);
    } */
     
    public function close_modal()
    {
        $this->dispatchBrowserEvent('close-modal');
        $this->reset([
            'medicament_id', 'code', 'nom', 'forme', 'administration', 'description', 'producteur',
            'code2', 'nom2', 'forme2', 'administration2', 'description2', 'producteur2', 
        ]); 
    }
    
    public function store()
    {
        $medicament = new Medicament();
        $medicament->code = $this->code;
        $medicament->nom = $this->nom; 
        $medicament->forme = $this->forme;
        $medicament->administration = $this->administration;
        $medicament->description = $this->description;
        $medicament->producteur = $this->producteur;
        $query = $medicament->save();

        if ($query) {
            $this->close_modal();
           /*  $this->getMedicaments(); */
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

    public function loadid($medicament_id)
    {
        $this->medicament_id = $medicament_id;
        $medicament = Medicament::find($medicament_id);
        $this->code2 = $medicament->code; 
        $this->nom2 = $medicament->nom; 
        $this->forme2 = $medicament->forme; 
        $this->administration2 = $medicament->administration; 
        $this->description2 = $medicament->description; 
        $this->producteur2 = $medicament->producteur; 
    }

    
    public function update()
    {
        $medicament = Medicament::find($this->medicament_id);
        $query = $medicament->update([
            'code' => $this->code2,
            'nom' => $this->nom2,
            'forme' => $this->forme2,
            'administration' => $this->administration2,
            'description' => $this->description2,
            'producteur' => $this->producteur2, 
        ]);
        if ($query) { 
            $this->close_modal();
           /*  $this->getMedicaments(); */
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
        $medicament = Medicament::find($this->medicament_id);
        $medicament->delete();
        /* $this->getMedicaments(); */

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Suppression éffectuée avec succès!']
        );
    }

    public function render()
    {
        $search = $this->search ;

        $medicaments = Medicament::Where(function ($query) use ($search) {
            $query->where('nom', 'Like', '%' . $search . '%')
                ->orWhere('forme', 'Like', '%' . $search . '%')
                ->orWhere('administration', 'Like', '%' . $search . '%')
                ->orWhere('producteur', 'Like', '%' . $search . '%') ;
        })->orderBy("nom", "asc")->paginate(10);

        return view('livewire.gestion-medicaments', ['medicaments' => $medicaments] );
    }
}
