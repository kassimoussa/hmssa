<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresMedoc extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescription_id',
        'medicament_id', 
        'quantite', 
    ];

    public function medicament()
    {
        return $this->belongsTo(Medicament::class, 'medicament_id');
    }

    public function prescription()
    {
        return $this->belongsTo(Prescription::class, 'prescription_id');
    }
}
