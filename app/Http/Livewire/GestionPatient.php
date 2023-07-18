<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class GestionPatient extends Component
{
    use WithFileUploads;

    public $search = ""; 
    public $patients, $patient_id, $nom, $nom2, $sexe, $sexe2, $gp_sanguin, $gp_sanguin2, $adresse, $adresse2, $matricule, $matricule2,
    $affiliation, $affiliation2, $telephone, $telephone2, $lieu_naissance, $lieu_naissance2, $date_naissance,
    $date_naissance2, $user_id,  $filename, $filename2,  $filename3, $audj, $imgUrl, $url;
    public $selected_sexe = [];
    public $selected_groupe = [];
    public $selected_affiliation = [];

    public function mount()
    {
        $this->audj = Carbon::today()->format('Y-m-d');
        $this->url = "images/addphoto.png";
        $this->imgUrl = "";
        $this->user_id = session('id');
    }

    public function getPatients()
    {
        $search = $this->search ;
        /* $this->patients = Patient::Where(function ($query) use ($search) {
            $query->where('matricule', 'Like', '%' . $search . '%')
                ->orWhere('nom', 'Like', '%' . $search . '%')
                ->orWhere('telephone', 'Like', '%' . $search . '%')
                ->orWhere('sexe', 'Like', '%' . $search . '%')
                ->orWhere('affiliation', 'Like', '%' . $search . '%');
        })->orderBy("created_at", "asc")
            ->get();  */

            $this->patients =  Patient::whereLike(['matricule', 'nom', 'telephone'], $this->search ?? '')
            ->when($this->selected_sexe, function ($query, $selected_sexe) {
                return $query->whereIn('sexe', $selected_sexe);
            })
            ->when($this->selected_groupe, function ($query, $selected_groupe) {
                return $query->whereIn('gp_sanguin', $selected_groupe);
            })
            ->when($this->selected_affiliation, function ($query, $selected_affiliation) {
                return $query->whereIn('affiliation', $selected_affiliation);
            })
            ->orderBy("nom", "asc")->get();
    }
     
    public function close_modal()
    {
        $this->reset([
            'nom', 'matricule', 'sexe', 'gp_sanguin', 'adresse', 'affiliation', 'telephone', 'lieu_naissance', 'date_naissance', 'filename', 'filename2', 'filename3'
            ,'nom2', 'matricule2', 'sexe2', 'gp_sanguin2', 'adresse2', 'affiliation2', 'telephone2', 'lieu_naissance2', 'date_naissance2',
        ]);
        $this->url = "images/addphoto.png";
    }

    public function store()
    {
        $patient = new Patient();
        $patient->nom = $this->nom;
        $patient->matricule = $this->matricule;
        $patient->sexe = $this->sexe;
        $patient->gp_sanguin = $this->gp_sanguin;
        $patient->adresse = $this->adresse;
        $patient->affiliation = $this->affiliation;
        $patient->telephone = $this->telephone;
        $patient->lieu_naissance = $this->lieu_naissance;
        $patient->date_naissance = $this->date_naissance;
        $patient->user_id = $this->user_id;
        if ($this->filename) {
            $image_name = time() . '.' . $this->filename->getClientOriginalName();
            $patient->filename = $image_name;
            $patient->public_path = "public/images/patients/" . $image_name;
            $patient->storage_path = "storage/images/patients/" . $image_name;
            $this->filename->storeAs('public/images/patients', $image_name);
        }
        $query = $patient->save();

        if ($query) {
            $this->close_modal();
            $this->getPatients();
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

    public function update()
    {
        $patient = Patient::find($this->patient_id);

        if ($this->filename2 != $patient->filename) {
            $image_name = time() . '.' . $this->filename2->getClientOriginalName();
            $public_path = "public/images/patients/" . $image_name;
            $storage_path = "storage/images/patients/" . $image_name;
            $this->filename2->storeAs('public/images/patients', $image_name);
            if ($patient->public_path != null) {
                Storage::delete($patient->public_path);
            }
            $query = $patient->update([
                'nom' => $this->nom2,
                'matricule' => $this->matricule2,
                'sexe' => $this->sexe2,
                'gp_sanguin' => $this->gp_sanguin2,
                'adresse' => $this->adresse2,
                'affiliation' => $this->affiliation2,
                'telephone' => $this->telephone2,
                'lieu_naissance' => $this->lieu_naissance2, 
                'date_naissance' => $this->date_naissance2,
                'filename' => $image_name,
                'public_path' => $public_path,
                'storage_path' => $storage_path,
            ]);
        } else {
            $query = $patient->update([
                'nom' => $this->nom2,
                'matricule' => $this->matricule2,
                'sexe' => $this->sexe2,
                'gp_sanguin' => $this->gp_sanguin2,
                'adresse' => $this->adresse2,
                'affiliation' => $this->affiliation2,
                'telephone' => $this->telephone2,
                'lieu_naissance' => $this->lieu_naissance2, 
                'date_naissance' => $this->date_naissance2,
            ]);
        }
        if ($query) {
            $this->close_modal();
            $this->getPatients();
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

    public function loadid($patient_id)
    {
        $this->patient_id = $patient_id;
        $patient = Patient::find($patient_id);
        $this->nom2 = $patient->nom;
        $this->matricule2 = $patient->matricule;
        $this->sexe2 = $patient->sexe;
        $this->gp_sanguin2 = $patient->gp_sanguin;
        $this->adresse2 = $patient->adresse;
        $this->telephone2 = $patient->telephone;
        $this->affiliation2 = $patient->affiliation;
        $this->lieu_naissance2 = $patient->lieu_naissance; 
        $this->date_naissance2 = $patient->date_naissance; 
        $this->filename2 = $patient->filename;
        $this->filename3 = $patient->filename;
        if ($patient->storage_path != null) {
            $this->url = $patient->storage_path;
        } else {
            $this->url = "images/addphoto.png";
        }
    }

    public function updated($propertyName)
    {
        if ($this->filename) {
            $this->url =  $this->filename->temporaryUrl();
        }
        if ($this->filename2) {
            if ($this->filename2 != $this->filename3) {
                $this->url =  $this->filename2->temporaryUrl();
            }
        }
    }

    public function showImg($patient_id)
    {
        $patient = Patient::find($patient_id);
        $this->imgUrl = $patient->storage_path;
    }

    public function close_img()
    {
        $this->imgUrl = "";
    }

    public function delete()
    {
        $patient = Patient::find($this->patient_id);
        if ($patient->public_path != null) {
            Storage::delete($patient->public_path);
        }
        $patient->delete();
        $this->getPatients();

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Suppression éffectuée avec succès!']
        );
    }



    public function render()
    {
        $this->getPatients();
        return view('livewire.gestion-patient');
    }
}
