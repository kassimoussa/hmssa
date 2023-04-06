<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'patient_id',
        'date', 
        'title', 
        'start', 
        'end', 
        'status',
        'color'
    ];

    
    public function visite() {
        return $this->belongsTo(Visite::class, 'visite_id');
    }

}
