<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etablissement;

class Entete extends Model
{
    use HasFactory;

    protected $fillable =["numero", "email", "logo"];

    public function entete(){
        return $this->hasOne(Etablissement::class);
    }
}
