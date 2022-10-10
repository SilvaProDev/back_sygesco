<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Entete;

class Etablissement extends Model
{
    use HasFactory;

    protected $fillable =["code", "code_etabl","adresse", "libelle"];

    public function entete(){
        return $this->belongsTo(Entete::class);
    }
}
