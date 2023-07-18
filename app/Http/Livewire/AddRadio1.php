<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Consultation; 
use App\Models\Radio; 
use App\Models\Typera;

class AddRadio1 extends Component
{
    public $consultation_id, $patient_id, $medecin_id, $observations, $level, $resultats, $url;
    
    public $radios, $radio_id, $radio_types, $radio_typeid ;

    public function mount($consultation_id)
    {
        $this->level = session('level');
        $this->consultation_id = $consultation_id;
        
        $consultation = Consultation::find($consultation_id);
        $this->patient_id = $consultation->patient_id;
        $this->medecin_id = $consultation->medecin_id;
        $this->observations = $consultation->observations;

        
        $this->radio_types = Typera::orderBy('nom', 'asc')->get(); 

    }

    public function getRadios()
    {
        $this->radios = Radio::where('consultation_id' , $this->consultation_id)->orderBy('created_at', 'asc')->get();
    }
     
    public function close_modal()
    {
        $this->dispatchBrowserEvent('close-modal');
        $this->reset([
            'radio_typeid'
        ]); 
    }
    
    public function store()
    {
        $radio = new Radio();
        $radio->type_id = $this->radio_typeid; 
        $radio->consultation_id = $this->consultation_id;
        $radio->patient_id = $this->patient_id;
        $radio->medecin_id = $this->medecin_id;
        $query = $radio->save();

        if ($query) {
            $this->close_modal();
            $this->getRadios();
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

    public function loadid($radio_id)
    {
        $this->radio_id = $radio_id;
        $radio = Radio::find($radio_id);
        $this->resultats = $radio->resultats; 
        if ($radio->storage_path != null) {
            $this->url = $radio->storage_path;
        } else {
            $this->url = "images/addphoto.png";
        }
    }
    
    public function delete()
    {
        $radio = Radio::find($this->radio_id);
        $radio->delete();
        $this->getRadios();

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Suppression éffectuée avec succès!']
        );
    }

    public function render()
    {
        $this->getRadios();
        return view('livewire.add-radio1');
    }
}
