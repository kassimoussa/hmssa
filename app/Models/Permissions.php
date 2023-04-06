<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'groupe', 
        'nom', 
        'description', 
    ]; 

    public function users() {
        return $this->belongsToMany(User::class, 'droits')->withPivot('active')->withTimestamps();
    }

}
