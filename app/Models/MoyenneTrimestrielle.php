<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoyenneTrimestrielle extends Model
{
    use HasFactory;

    protected $fillable =[
        "trimestre_id","classe_id", "student_id", 
       "niveau_id", "moyenne", "statut"];
}
