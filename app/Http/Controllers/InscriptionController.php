<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant; 
use RealRashid\SweetAlert\Facades\Alert;

class InscriptionController extends Controller
{
    public function create()
    {
        return view('inscription');
    }

    public function store(Request $request)
    {
        // Validate and store the input data
       $data = $request->all();
    $etudiant = new Etudiant();
    $etudiant->nom = $data['nom'];
    $etudiant->prenom = $data['prenom'];
    $etudiant->age = $data['age'];
    $etudiant->adresse = $data['adresse'];
    $etudiant->email = $data['email'];
    $etudiant->date_naissance = $data['date_naissance'];
    $etudiant->ville = $data['ville'];
    $etudiant->cne = $data['cne'];
    $etudiant->cni = $data['cni'];
    $etudiant->telephone = $data['telephone'];
    $etudiant->metier_de_pere = $data['metier_de_pere'];
    $etudiant->metier_de_mere = $data['metier_de_mere'];
    $etudiant->bulletin_de_salaire = $data['bulletin_de_salaire'];
    $etudiant->filiere_ensam = $data['filiere_ensam'];
    $etudiant->niveau_ancienne = $data['niveau_ancienne'];
    $etudiant->sexe = $data['sexe'];
    $etudiant->etablissement_ancienne = $data['etablissement_ancienne'];

        Etudiant::create($data);
        Alert::success('Success', 'Etudiant inscribed successfully!');

        return view('welcome')->with('success', 'Etudiant inscribed successfully.');
    }
}

