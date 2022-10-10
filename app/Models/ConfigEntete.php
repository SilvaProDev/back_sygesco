<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigEntete extends Model
{
    use HasFactory;
    protected $fillable =["nom", "slogan", "contact", "email", "site", "photo","adresse","code","statut"];
}
