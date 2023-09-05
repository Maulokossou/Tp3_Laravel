<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    protected $fillable = ["name", "hobbies", "spécialité", "images"];
    protected $table ="etudiant";
    use SoftDeletes;

    public function cours()
    {
        return $this->belongsToMany(Cours::class);
    }
}
