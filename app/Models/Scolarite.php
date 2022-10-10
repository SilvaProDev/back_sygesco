<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AnneeScolaire;
use App\Models\Student;

class Scolarite extends Model
{
    use HasFactory;
    protected $fillable =["annee_id", "student_id", "montant","classe_id", "niveau_id", "date"];

    public function annee(){
        return $this->hasOne(AnneeScolaire::class);
    }
    public function student(){
        return $this->hasOne(Student::class);
    }
}
