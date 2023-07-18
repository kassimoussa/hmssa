<?php

namespace App\Http\Livewire;

use App\Models\Examens;
use App\Models\ExamensType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class GestionExamens extends Component
{
    public $examens, $search, $examen_id, $resultats;

    public function mount()
    {
        /* $this->audj = Carbon::today()->format('Y-m-d');
        $this->url = "images/addphoto.png";
        $this->imgUrl = "";
        $this->user_id = session('id'); */
    }

    public function getExamens()
    {
        $search = $this->search ;

        $this->examens = Examens::whereHas('type', function (Builder $query) use ($search) {
            $query->where('nom', 'Like', '%' . $search . '%')
            ->orWhere('description', 'Like', '%' . $search . '%') ;
        })
        ->orWhereHas('patient', function (Builder $query) use ($search) {
            $query->where('nom', 'Like', '%' . $search . '%')
            ->orWhere('matricule', 'Like', '%' . $search . '%') ;
        })
        ->orWhereHas('medecin', function (Builder $query) use ($search) {
            $query->where('nom', 'Like', '%' . $search . '%')
            ->orWhere('matricule', 'Like', '%' . $search . '%') ;
        })
        ->orWhereHas('laborantin', function (Builder $query) use ($search) {
            $query->where('nom', 'Like', '%' . $search . '%')
            ->orWhere('matricule', 'Like', '%' . $search . '%') ;
        })
        ->orWhereHas('consultation', function (Builder $query) use ($search) {
            $query->where('date', 'Like', '%' . $search . '%') ;
        })
        ->orderBy("created_at", "desc")->get(); 
    }
     
    public function close_modal()
    {
        $this->dispatchBrowserEvent('close-modal');
        $this->reset([
            'resultats', 'examen_id'
        ]); 
    }

    public function loadid($examen_id)
    {
        $this->examen_id = $examen_id;
        $examen = Examens::find($examen_id); 
        $this->resultats = $examen->resultats;
    }
    
    public function store()
    {
        $examen = Examens::find($this->examen_id);

        $query = $examen->update([
            'resultats' => $this->resultats,
            'status' => "OUI",
        ]);
        
        if ($query) {
            $this->getExamens();
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

    public function render()
    {
        $this->getExamens();
        return view('livewire.gestion-examens');
    }
}
