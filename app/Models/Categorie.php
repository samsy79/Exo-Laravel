<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ["nom","user_id"];
    protected $table = "categories";
    public function cours()
    {
        return $this->hasMany(Cours::class);
    }
}

