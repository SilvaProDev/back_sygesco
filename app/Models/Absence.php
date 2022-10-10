<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Absence extends Model
{
    use HasFactory;

    protected $fillable =["date","matiere_id", "student_id", "motif", "trimestre_id"];
    
    public function students(){
        return $this->hasMany(Student::class);
    }
}
