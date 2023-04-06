<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $fillable = [
        'nom',
        'username',
        'email',
        'password',
        'fontion_id',
        'departement_id',
        'grade_id',
        'adresse',
        'telephone',
        'matricule',
        'date_embauche', 
        'sexe',
        'date_naissance',
        'filename',
        'public_path',
        'storage_path', 
    ];

    public function fonction() {
        return $this->belongsTo(Fonction::class, 'fonction_id');
    }

    public function departement() {
        return $this->belongsTo(Departement::class, 'departement_id');
    }

    public function grade() {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function permissions() {
        return $this->belongsToMany(Permissions::class, 'droits')->withPivot('active')->withTimestamps();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
