<?php

namespace App\Http\Livewire;

use App\Models\Radio;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithFileUploads;

class GestionRadios extends Component
{
    use WithFileUploads;
    public $radios, $search, $radio_id, $resultats, $filename, $filename2,  $filename3, $url;

    public function mount()
    {
        /* $this->audj = Carbon::today()->format('Y-m-d');
        $this->url = "images/addphoto.png";
        $this->imgUrl = "";
        $this->radio_id = session('id'); */
    }

    public function getRadios()
    {
        $search = $this->search;

        $this->radios = Radio::whereHas('type', function (Builder $query) use ($search) {
            $query->where('nom', 'Like', '%' . $search . '%')
                ->orWhere('description', 'Like', '%' . $search . '%');
        })
            ->orWhereHas('patient', function (Builder $query) use ($search) {
                $query->where('nom', 'Like', '%' . $search . '%')
                    ->orWhere('matricule', 'Like', '%' . $search . '%');
            })
            ->orWhereHas('medecin', function (Builder $query) use ($search) {
                $query->where('nom', 'Like', '%' . $search . '%')
                    ->orWhere('matricule', 'Like', '%' . $search . '%');
            })
            ->orWhereHas('radiologue', function (Builder $query) use ($search) {
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
            'resultats', 'radio_id', 'filename', 'filename2'
        ]);
    }

    public function loadid($radio_id)
    {
        $this->radio_id = $radio_id;
        $radio = Radio::find($radio_id);
        $this->resultats = $radio->resultats;
        $this->filename2 = $radio->filename;
        if ($radio->storage_path != null) {
            $this->url = $radio->storage_path;
        } else {
            $this->url = "images/addphoto.png";
        }
    }

    public function store()
    {
        $radio = Radio::find($this->radio_id);

        if ($this->filename) {
            $image_name = time() . '.' . $this->filename->getClientOriginalName();
            $public_path = "public/images/radios/" . $image_name;
            $storage_path = "storage/images/radios/" . $image_name;
            $this->filename->storeAs('public/images/radios', $image_name);

            $query = $radio->update([
                'resultats' => $this->resultats,
                'status' => "OUI",
                'filename' => $image_name,
                'public_path' => $public_path,
                'storage_path' => $storage_path,
            ]);
        } else {
            $query = $radio->update([
                'resultats' => $this->resultats,
                'status' => "OUI", 
            ]);
        }

        if ($query) {
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

    public function render()
    {
        $this->getRadios();
        return view('livewire.gestion-radios');
    }
}
