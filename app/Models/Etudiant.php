<?php
namespace App;

namespace App\Models;

// app/Etudiant.php


use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $table = 'etudiants';

    protected $fillable = [
        'nom',
        'prenom',
        'age',
        'adresse',
        'email',
        'date_naissance',
        'ville',
        'cne',
        'cni',
        'telephone',
        'metier_de_pere',
        'metier_de_mere',
        'bulletin_de_salaire',
        'filiere_ensam',
        'niveau_ancienne',
        'sexe',
        'etablissement_ancienne',
    ];

}
