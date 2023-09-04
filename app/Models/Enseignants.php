<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignants extends Model
{
    protected $fillable = ["firstname", "lastname", "telephone", "adresse"];
    protected $table ="enseignants";

    public function cours()
    {
        return $this->belongsToMany(Cours::class);
    }
}
