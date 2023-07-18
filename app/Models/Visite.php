<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'patient_id',
        'consultation_id',
        'date', 
        'title', 
        'start', 
        'end', 
        'status',
        'color'
    ];

    public function patient() {
        return $this->belongsTo(Patient::class, 'patient_id');
    }


}
