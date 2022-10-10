<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetanceLivret extends Model
{
    use HasFactory;
    protected $fillable =["annee_id", "trimestre_id", "niveau_id", "classe_id","eleve_id", "matiere_id",
                 "livret_id","libelle_id","date","note"];
}
