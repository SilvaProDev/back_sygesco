<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classe;
use App\Models\Note;
use App\Models\Devoir;
use App\Models\Absence;
use App\Models\Scolarite;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
       
        "nom",
        "prenom",
        "sexe",
        "date_naissance",
        "matricule",           
        "niveau_id",
        "classe_id",
        "annee_id",
       "scolarite",
        "oriente",
        "nationalite",
        "email",
        "adresse",
        "maladie",
        "transport",
        "cantine",
        "photo",
        "droit",
        "lieu_naissance",
        "interime",
        "regime",
        "redoublant",
        "nom_pere",
        "contact_pere",
        "nom_mere",
        "contact_mere",
        "nom_tuteur",
        "contact_tuteur",
        "autre",
    ];
  


    public function classe(){
        return $this->hasOne(Classe::class);
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }
    public function devoirs(){
        return $this->hasMany(Devoir::class);
    }
    public function cantine(){
        return $this->hasOne(Cantine::class);
    }

    public function absences(){
        return $this->hasMany(Absence::class);
    }
    public function scolarite(){
        return $this->hasMany(Scolarite::class);
    }
}
