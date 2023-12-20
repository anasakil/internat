@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('title', 'Employes List')
@section('content_header')
@stop<!-- resources/views/etudiant/show.blade.php -->


@section('content')
<div class="container">
    <h2>Etudiant Details</h2>
    <div class="card text-white bg-primary">
    <div class="card-body">
        <h5 class="card-title text-white">Nom: {{ $etudiant->nom }}</h5>
        <p class="card-text">Prenom: {{ $etudiant->prenom }}</p>
        <p class="card-text">Age: {{ $etudiant->age }}</p>
        <p class="card-text">Adresse: {{ $etudiant->adresse }}</p>
        <p class="card-text">Email: {{ $etudiant->email }}</p>
        <p class="card-text">Date de Naissance: {{ $etudiant->date_naissance }}</p>
        <p class="card-text">Ville: {{ $etudiant->ville }}</p>
        <p class="card-text">CNE: {{ $etudiant->cne }}</p>
        <p class="card-text">CNI: {{ $etudiant->cni }}</p>
        <p class="card-text">Telephone: {{ $etudiant->telephone }}</p>
        <p class="card-text">Metier de Pere: {{ $etudiant->metier_de_pere }}</p>
        <p class="card-text">Metier de Mere: {{ $etudiant->metier_de_mere }}</p>
        <p class="card-text">Bulletin de Salaire: {{ $etudiant->bulletin_de_salaire }}</p>
        <p class="card-text">Filiere EnsAM: {{ $etudiant->filiere_ensam }}</p>
        <p class="card-text">Niveau Ancienne: {{ $etudiant->niveau_ancienne }}</p>
        <p class="card-text">Sexe: {{ $etudiant->sexe }}</p>
        <p class="card-text">Etablissement Ancienne: {{ $etudiant->etablissement_ancienne }}</p>
    </div>
</div>
    
</div>


    </div>
</div>
@endsection
