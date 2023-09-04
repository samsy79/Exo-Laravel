<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffecterCours extends Model
{
   
    protected $table = "affecter_cours";
    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}

