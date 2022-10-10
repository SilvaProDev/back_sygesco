<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Semestre;
use App\Models\Scolarite;
class AnneeScolaire extends Model
{
    use HasFactory;

    protected $fillable =["debut_annee","fin_annee", "date_debut", "date_fin", "encours"];
    public $timestamps = false;

    public function semestre(){
        return $this->hasMany(Semestre::class);
    }
    
    public function scolarites(){
        return $this->hasMany(Scolarite::class);
    }

}
