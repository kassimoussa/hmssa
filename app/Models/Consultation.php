<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'patient_id',
        'date', 
        'motif',
        'symptomes',
        'tension_arterielle',
        'temperature_corporelle',
        'glycemie',
        'poids', 
        'taille', 
        'spo2', 
    ];

    public function documents() {
        return $this->hasMany(Document::class, 'document_id');
    }
}
