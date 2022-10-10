<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cantine;

class Cantine extends Model
{
    use HasFactory;
    protected $fillable =["montant", "classe_id", "student_id", "niveau_id","date", "semestre"];
    public function student(){
        return $this->hasMany(Cantine::class);
    }
}
