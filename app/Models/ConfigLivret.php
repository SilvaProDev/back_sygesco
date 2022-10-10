<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigLivret extends Model
{
    use HasFactory;

    protected $fillable =["livret_id", "libelle"];

}
