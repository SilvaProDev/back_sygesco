<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendSms extends Model
{
    use HasFactory;
    protected $fillable =["annee_id", "date",  "message", "niveau_id", "classe_id"];
}
