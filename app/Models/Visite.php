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
        'date', 
    ];

    public function patient() {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    
    public function event() {
        return $this->belongsTo(Event::class, 'event_id');
    }

}
