<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radio extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'consultation_id',
        'patient_id',
        'medecin_id',
        'radiologue_id',
        'resultats', 
        'status',  
        'filename',
        'public_path',
        'storage_path', 
    ];
 
    public function type()
    {
        return $this->belongsTo(Typera::class, 'type_id');
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

    public function radiologue()
    {
        return $this->belongsTo(User::class, 'radiologue_id');
    }
}
