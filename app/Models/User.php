<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
   /*  use HasApiTokens, HasFactory, Notifiable;
 */
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'birthday',
        'email',
        'email_verified_at',
        'email_verified',
        'picture'

    ];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
      */
      /*
    protected $casts = [
        'email_verified_at' => 'datetime',
    ]; */
    protected $table='user';
    
    public function etudiant()
    {
        return $this->hasOne(Etudiant::class);
    }

    public function enseignant()
    {
        return $this->hasOne(Enseignant::class);
    }

    public function affectationsEnseignant()
    {
        return $this->hasMany(AffecterCours::class, 'enseignant_id');
    }

    public function affectationsEtudiant()
    {
        return $this->hasMany(AffecterCours::class, 'etudiant_id');
    }
    
    public function ajouterEtudiant($nom, $prenom, $email)
    {
        $etudiant = Etudiant::create([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
        ]);

        $this->etudiant()->save($etudiant);

        return $etudiant;
    }

    public function ajouterEnseignant($nom, $prenom, $email)
    {
        $enseignant = Enseignant::create([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
        ]);

        $this->enseignant()->save($enseignant);

        return $enseignant;
    }

}
