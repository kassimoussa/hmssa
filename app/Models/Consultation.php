<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'patient_id',
        'infirmier_id',
        'medecin_id',
        'date', 
        'motif',
        'tension',
        'temperature',
        'glycemie',
        'poids', 
        'taille', 
        'spo2', 
        'observations',
    ];

    public function documents() {
        return $this->hasMany(Document::class, 'document_id');
    }

    public function patient() {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function infirmier() {
        return $this->belongsTo(User::class, 'infirmier_id');
    }

    public function medecin() {
        return $this->belongsTo(User::class, 'medecin_id');
    }

    public function examens() {
        return $this->hasMany(Examens::class, 'consultation_id');
    }

    public function radios() {
        return $this->hasMany(Radio::class, 'consultation_id');
    }


}
