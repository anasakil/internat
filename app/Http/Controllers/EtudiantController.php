<?php

// app/Http/Controllers/EtudiantController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\AcceptStudent;
use App\Exports\EtudiantsExport;
use Maatwebsite\Excel\Facades\Excel;

class EtudiantController extends Controller
{
    public function exportAllEtudiants()
    {
        return Excel::download(new EtudiantsExport, 'all_etudiants.xlsx');
    }
    public function exportEtudiants()
    {
        return Excel::download(new EtudiantsExport, 'etudiants.xlsx');
    }
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiant.index', compact('etudiants'));
    }

    public function create()
    {
        return view('etudiant.create');
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
        $etudiant->save();
        return redirect()->route('etudiants.index')->with('success', 'Etudiant added successfully.');
    }


    public function show($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('etudiant.show', compact('etudiant'));
    }

    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('etudiant.edit', compact('etudiant'))->with([
            "etudiant" => $etudiant]);
    }

    public function update(Request $request, $id)
    {
        // Validate the input data (you can add validation rules here)
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'age' => 'required|integer',
            'adresse' => 'required|string',
            'date_naissance' => 'required|date',
            'ville' => 'required|string',
            'cne' => 'required|string',
            'cni' => 'required|string',
            'filiere_ensam' => 'required|string',
            'niveau_ensam' => 'required|string',
            'filiere_ancienne' => 'required|string',
            'niveau_ancienne' => 'required|string',
            'moyen_ancienne' => 'required|numeric',
            'etablissement_ancienne' => 'required|string',
        ]);
    
        $etudiant = Etudiant::findOrFail($id);
    
        $etudiant->update($request->all());
    
        return redirect()->route('etudiants.index')->with('success', 'Etudiant added successfully.');
    }
    

    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();
        return redirect()->route('etudiants.index');
    }

    public function showPieChart()
    {
        $etudiantCount = Etudiant::count();
        $acceptStudentCount = AcceptStudent::count();
    
        return view('home', compact('etudiantCount', 'acceptStudentCount'));
    }




}

