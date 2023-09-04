<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    protected $fillable = ["nom","prenom","email","cours","phone","adresse","cours","user_id"];
    protected $table = "enseignants";
    public function cours()
    {
        return $this->belongsToMany(Cours::class, 'affecter_cours', 'enseignant_id', 'cours_id');
    }

    public function etudiants()
    {
        return $this->belongsToMany(Etudiant::class, 'affecter_cours', 'enseignant_id', 'etudiant_id');
    }
}

