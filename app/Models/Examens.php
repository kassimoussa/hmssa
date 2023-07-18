<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examens extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'consultation_id',
        'patient_id',
        'medecin_id',
        'laborantin_id',
        'resultats',
        'status',
    ];

    public function type()
    {
        return $this->belongsTo(Typeex::class, 'type_id');
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

    public function laborantin()
    {
        return $this->belongsTo(User::class, 'laborantin_id');
    }
}
