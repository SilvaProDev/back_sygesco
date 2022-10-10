<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Student;
use App\Models\Niveau;
use App\Models\Note;

class Classe extends Model
{
    use HasFactory;
    protected $fillable =["code", "libelle", "scolarite", "niveau_id"];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function student(){
        return $this->hasMany(Classe::class);
    }
    public function notes(){
        return $this->hasMany(Note::class);
    }

    public function niveaux(){
        return $this->belongsTo(Niveau::class);
    }
    

}
