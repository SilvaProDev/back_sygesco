<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classe;
use App\Models\Matiere;

class Niveau extends Model
{
    use HasFactory;
    protected $fillable =["code", "libelle"];

    public function classes(){
        return $this->hasMany(Classe::class);

    }

    public function matieres(){
        return $this->hasMany(Matiere::class);
    }
    
}
