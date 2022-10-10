<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AnneeScolaire;
use App\Models\Note;

class Semestre extends Model
{
    use HasFactory;
    protected $fillable =["annee_id", "libelle", "date_debut", "date_fin","encours"];


    public function annee(){
        return $this->hasOne(AnneeScolaire::class);
    }
    public function notes(){
        return $this->hasMany(Note::class);
    }
}
