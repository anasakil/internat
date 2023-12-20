<?php

// app/Exports/EtudiantsExport.php

namespace App\Exports;

use App\Models\Etudiant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Facades\Excel;

class EtudiantsExport implements FromCollection, WithHeadings
{
    
    public function collection()
    {
        return Etudiant::all();
    }
    public function exportAllEtudiants()
    {
        return Excel::download(new EtudiantsExport, 'all_etudiants.xlsx');
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nom',
            'Prenom',
            'Age',
            'Adresse',
            'Email',
            'Date de Naissance',
            'Ville',
            'CNE',
            'CNI',
            'Telephone',
            'Metier de Pere',
            'Metier de Mere',
            'Bulletin de Salaire',
            'Filiere Ensam',
            'Niveau Ancienne',
            'Sexe',
            'Etablissement Ancienne',
        ];
    }
    
}

