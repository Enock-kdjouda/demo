<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;
    public function etudiants(){
        return $this->hasMany(Etudiant::class, 'filiere_id', 'id');
    }
}
