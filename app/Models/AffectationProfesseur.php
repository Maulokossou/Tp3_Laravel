<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffectationProfesseur extends Model
{
    protected $fillable = ["cours_id", "enseignant_id"];
    protected $table ="cours_enseignant";
}
