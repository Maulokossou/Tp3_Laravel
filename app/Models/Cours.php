<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $fillable = ["name", "Maxhoraire", "Coefficient", "categorie_id"];
    protected $table ="cours";

    public function category(){
        return $this->belongsTo(Category::class, "categorie_id", "id");
    }
    
    public function enseignants()
    {
        return $this->belongsToMany(Enseignant::class);
    }
    public function etudiants()
    {
        return $this->belongsToMany(Student::class);
    }
   
}
