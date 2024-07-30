<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    public function filiere(){
        return $this->belongsTo(Filiere::class,'filiere_id','id');
    }
    
    
}
