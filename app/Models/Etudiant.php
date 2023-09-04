<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = ["nom","prenom","hobbies","specialite","nationalite" ,"description","picture","active","user_id"];
    protected $table = "etudiant";

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
                        //hasOne
       }
    public function cours()
    {
        return $this->belongsToMany(Cours::class, 'affecter_cours', 'etudiant_id', 'cours_id');
    }

    public function enseignants()
    {
        return $this->belongsToMany(Enseignant::class, 'affecter_cours', 'etudiant_id', 'enseignant_id');
    }


}
