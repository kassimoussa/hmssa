<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'patient_id',
        'nom',
        'description',
        'date', 
        'filename',
        'public_path',
        'storage_path', 
    ];

    public function patient() {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

   /*  public function consultation() {
        return $this->belongsTo(Consultation::class, 'consultarion_id');
    } */

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
