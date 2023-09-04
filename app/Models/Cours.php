<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Dans le modèle Cours.php
class Cours extends Model
{
    protected $fillable = ["nom","coef","masse_horaire","user_id","categorie_id"];
    protected $table = "cours";
    public function enseignants()
    {
        return $this->belongsToMany(Enseignant::class, 'affecter_cours', 'cours_id', 'enseignant_id');
    }

    public function etudiants()
    {
        return $this->belongsToMany(Etudiant::class, 'affecter_cours', 'cours_id', 'etudiant_id');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}

