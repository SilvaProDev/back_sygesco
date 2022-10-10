<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Niveau;
class Matiere extends Model
{
    use HasFactory;
    protected $fillable =["niveau_id", "nouvelle_matiere_id","coefficient", "serie", "classe_id", "statut"];
    
    public function niveau(){
        return $this->hasOne(Niveau::class);
    }
}
