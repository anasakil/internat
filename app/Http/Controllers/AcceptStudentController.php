<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\AcceptStudent;
use App\Models\Chambre;
use App\Models\Batiment;
use Illuminate\Http\Request;


class AcceptStudentController extends Controller
{


    public function store(Etudiant $etudiant)
    {
        AcceptStudent::create([
            'nom' => $etudiant->nom,
            'prenom' => $etudiant->prenom,
            'cne' => $etudiant->cne,


        ]);

        return redirect()->back()->with('success', 'student accept.');
    }
    public function index()
    {
        $acceptStudents = AcceptStudent::all();
        $batiments = Batiment::all();
        $chambres = Chambre::all();
        $chambers = Chambre::with('acceptStudents')->get(); // Fetch the chambres data
        return view('accept-student.index', compact('batiments', 'acceptStudents'), compact('acceptStudents', 'chambres'));


        return view('index', compact('chambers'));
    }


    public function assignChamber(AcceptStudent $acceptStudent, Request $request)
    {
        $acceptStudent->chambre_id = $request->chambre_id;
        $acceptStudent->save();

        return redirect()->back()->with('success', 'Chamber assigned successfully.');
    }







    public function destroy($id)
    {
        AcceptStudent::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Student deleted.');
    }
}
