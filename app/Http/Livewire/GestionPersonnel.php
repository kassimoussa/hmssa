<?php

namespace App\Http\Livewire;

use App\Models\Departement;
use App\Models\Fonction;
use App\Models\Grade;
use App\Models\Permissions;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class GestionPersonnel extends Component
{
    use WithFileUploads;

    public $search = "";
    public $fonctions, $departements, $grades;
    public $personnel, $user_id, $nom, $matricule, $sexe, $grade_id, $fonction_id, $departement_id,
        $date_embauche, $date_naissance, $adresse, $telephone, $username, $email, $password, $filename, $filename2,  $filename3, $audj, $imgUrl, $url;
    public $allPermissions, $groupes;
    public $permisions = [];
    public $selected_permisions = [];



    public function mount()
    {
        $this->audj = Carbon::today()->format('Y-m-d');
        $this->url = "images/addphoto.png";
        $this->imgUrl = "";
        $this->fonctions = Fonction::all();
        $this->departements = Departement::all();
        $this->grades = Grade::orderBy('id', 'asc')->get();
        $this->allPermissions = Permissions::orderBy('id', 'asc')->get();
        $this->groupes = Permissions::distinct()->pluck('groupe');;
    }

    protected $rules = [
        'matricule' => 'required|unique:users',
        'email' => 'required|unique:users',
    ];

    protected $messages = [
        'matricule.unique' => 'Un utilisateur avec ce matricule est déja enregistré dans la base de données !',
        'email.unique' => 'Un utilisateur avec cet email est déja enregistré dans la base de données !',
    ];

    public function getPersonnel()
    {
        $search = $this->search ;
        $this->personnel = User::Where(function ($query) use ($search) {
            $query->where('matricule', 'Like', '%' . $search . '%')
                ->orWhere('email', 'Like', '%' . $search . '%')
                ->orWhere('nom', 'Like', '%' . $search . '%')
                ->orWhere('telephone', 'Like', '%' . $search . '%');
        })->with('fonction')->with('departement')->with('grade')
            ->orderBy("matricule", "asc")
            ->get();
        //$this->personnel = User::all();
    }

    public function getPermissions($user_id){
        $this->user_id = $user_id;
        $user = User::with("permissions")->find($user_id);
        $this->selected_permisions = $user->permissions->pluck('id');
        /* return dd($this->groupes); */
    }
    
    public function close_modal()
    {
        $this->reset([
            'user_id', 'nom', 'matricule', 'sexe', 'grade_id', 'fonction_id', 'departement_id', 'date_embauche', 'date_naissance', 'adresse', 'telephone', 'email', 'username', 'password', 'filename', 'filename2', 'selected_permisions'
        ]);
        $this->url = "images/addphoto.png";
    }

    public function store()
    {
        $user = new User();
        $user->nom = $this->nom;
        $user->matricule = $this->matricule;
        $user->sexe = $this->sexe;
        $user->grade_id = $this->grade_id;
        $user->fonction_id = $this->fonction_id;
        $user->departement_id = $this->departement_id;
        $user->date_embauche = $this->date_embauche;
        $user->date_naissance = $this->date_naissance;
        $user->adresse = $this->adresse;
        $user->telephone = $this->telephone;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = $this->password;
        if ($this->filename) {
            $image_name = time() . '.' . $this->filename->getClientOriginalName();
            $user->filename = $image_name;
            $user->public_path = "public/images/users/" . $image_name;
            $user->storage_path = "storage/images/users/" . $image_name;
            $this->filename->storeAs('public/images/users', $image_name);
        }
        $query = $user->save();

        if ($query) {
            $this->close_modal();
            $this->getPersonnel();
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
        $user = User::find($this->user_id);

        if ($this->filename2 != $user->filename) {
            $image_name = time() . '.' . $this->filename2->getClientOriginalName();
            $public_path = "public/images/users/" . $image_name;
            $storage_path = "storage/images/users/" . $image_name;
            $this->filename2->storeAs('public/images/users', $image_name);
            if ($user->public_path != null) {
                Storage::delete($user->public_path);
            }
            $query = $user->update([
                'nom' => $this->nom,
                'matricule' => $this->matricule,
                'sexe' => $this->sexe,
                'grade_id' => $this->grade_id,
                'fonction_id' => $this->fonction_id,
                'departement_id' => $this->departement_id,
                'nomdate_embauche' => $this->date_embauche,
                'date_naissance' => $this->date_naissance,
                'adresse' => $this->adresse,
                'telephone' => $this->telephone,
                'username' => $this->username,
                'email' => $this->email,
                'password' => $this->password,
                'filename' => $image_name,
                'public_path' => $public_path,
                'storage_path' => $storage_path,
            ]);
        } else {
            $query = $user->update([
                'nom' => $this->nom,
                'matricule' => $this->matricule,
                'sexe' => $this->sexe,
                'grade_id' => $this->grade_id,
                'fonction_id' => $this->fonction_id,
                'departement_id' => $this->departement_id,
                'nomdate_embauche' => $this->date_embauche,
                'date_naissance' => $this->date_naissance,
                'adresse' => $this->adresse,
                'telephone' => $this->telephone,
                'username' => $this->username,
                'email' => $this->email,
                'password' => $this->password,
            ]);
        }
        if ($query) {
            $this->close_modal();
            $this->getPersonnel();
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

    
    public function attach()
    {  
         $user = User::with("permissions")->find( $this->user_id);
         $query = $user->permissions()->sync($this->selected_permisions);
        
         if ($query) {
            $this->close_modal();
            $this->getPersonnel();
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


    public function loadid($user_id)
    {
        $this->user_id = $user_id;
        $user = User::with("permissions")->find($user_id);
        $this->selected_permisions = $user->permissions->pluck('id');
        $this->nom = $user->nom;
        $this->matricule = $user->matricule;
        $this->sexe = $user->sexe;
        $this->grade_id = $user->grade_id;
        $this->fonction_id = $user->fonction_id;
        $this->departement_id = $user->departement_id;
        $this->date_embauche = $user->date_embauche;
        $this->date_naissance = $user->date_naissance;
        $this->adresse = $user->adresse;
        $this->telephone = $user->telephone;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->filename2 = $user->filename;
        $this->filename3 = $user->filename;
        if ($user->storage_path != null) {
            $this->url = $user->storage_path;
        } else {
            $this->url = "images/addphoto.png";
        }
    }



    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if ($this->filename) {
            $this->url =  $this->filename->temporaryUrl();
        }
        if ($this->filename2) {
            if ($this->filename2 != $this->filename3) {
                $this->url =  $this->filename2->temporaryUrl();
            }
        }
    }

    public function showImg($user_id)
    {
        $user = User::find($user_id);
        $this->imgUrl = $user->storage_path;
    }

    public function close_img()
    {
        $this->imgUrl = "";
    }


    public function delete()
    {
        $user = User::find($this->user_id);
        if ($user->public_path != null) {
            Storage::delete($user->public_path);
        }
        $user->permissions()->detach();
        $user->delete();
        $this->getPersonnel();

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Suppression éffectuée avec succès!']
        );
    }


    public function render()
    {
        $this->getPersonnel();
        return view('livewire.gestion-personnel');
    }
}
