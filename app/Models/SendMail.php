<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendMail extends Model
{
    use HasFactory;

    protected $fillable =["annee_id", "date", "sujet", "message", "niveau_id", "classe_id","fichier","student_id"];
}
