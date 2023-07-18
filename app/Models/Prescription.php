<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicament_id',
        'consultation_id',
        'patient_id',
        'medecin_id',
        'pharmacien_id', 
        'quantite', 
        'dose', 
        'frequence_admin', 
        'duree',
        'status',
    ];

    public function medicament()
    {
        return $this->belongsTo(Medicament::class, 'medicament_id');
    }

    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'consultation_id');
    }
 
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function medecin()
    {
        return $this->belongsTo(User::class, 'medecin_id');
    }

    public function pharmacien()
    {
        return $this->belongsTo(User::class, 'pharmacien_id');
    }
}
 