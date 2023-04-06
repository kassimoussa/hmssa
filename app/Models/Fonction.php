<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nom', 
    ];

    public function users() {
        return $this->hasMany(User::class, 'fonction_id');
    }
}
