<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Semestre;
use App\Models\Classe;

class Note extends Model
{
    use HasFactory;
    protected $fillable =["trimestre_id","classe_id", "note", "student_id", 
    "matiere_id","niveau_id", "date", "statut","moy_annuelle"];

    public function student(){
        return $this->hasMany(Student::class);
    }
    public function trimestre(){
        return $this->hasOne(Semestre::class);
    }
    public function classe(){
        return $this->hasOne(Classe::class);
    }
}