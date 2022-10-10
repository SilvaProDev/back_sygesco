<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BilanAnnuel extends Model
{
    use HasFactory;

    protected $fillable =["candidat_inscrit", "garcon_inscrit", "fille_inscrit", "titre","annee", "niveau",
             "candidat_present", "garcon_present", "fille_present",
             "candidat_absent", "garcon_absent", "fille_absent",
             "candidat_admis", "garcon_admis", "fille_admis",
             "taux_candidat", "taux_garcon", "taux_fille",];

}
