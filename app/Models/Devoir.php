<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Devoir extends Model
{
    use HasFactory;
    protected $fillable =["code", "libelle"];

    public function student(){
        return $this->hasOne(Student::class);
    }
}
