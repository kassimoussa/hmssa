<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nom',
        'sexe',
        'gp_sanguin',
        'adresse',
        'matricule',
        'affiliation',
        'telephone',
        'lieu_naissance',
        'date_naissance',
        'filename',
        'public_path',
        'storage_path',
        'user_id',
    ];

    public function documents() {
        return $this->hasMany(Document::class, 'document_id');
    }

    public function visites() {
        return $this->hasMany(Visite::class, 'visite_id');
    }

}
