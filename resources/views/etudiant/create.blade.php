@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('title', 'Employes List')
@section('content_header')
@stop
<!-- resources/views/etudiant/create.blade.php -->


@section('content')
<div class="container">
    <h2>Create Etudiant</h2>
    <form method="post" action="{{ route('etudiants.store') }}">
    @csrf <!-- CSRF protection -->

    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" name="nom" id="nom" required>
    </div>

    <div class="form-group">
        <label for="prenom">Prenom:</label>
        <input type="text" class ="form-control" name="prenom" id="prenom" required>
    </div>

    <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" class="form-control" name="age" id="age" required>
    </div>

    <div class="form-group">
        <label for="adresse">Adresse:</label>
        <input type="text" class="form-control" name="adresse" id="adresse" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" id="email" required>
    </div>

    <div class="form-group">
        <label for="date_naissance">Date de Naissance:</label>
        <input type="date" class="form-control" name="date_naissance" id="date_naissance" required>
    </div>

    <div class="form-group">
        <label for="ville">Ville:</label>
        <input type="text" class="form-control" name="ville" id="ville" required>
    </div>

    <div class="form-group">
        <label for="cne">CNE:</label>
        <input type="text" class="form-control" name="cne" id="cne" required>
    </div>

    <div class="form-group">
        <label for="cni">CNI:</label>
        <input type="text" class="form-control" name="cni" id="cni" required>
    </div>

    <div class="form-group">
        <label for="telephone">Telephone:</label>
        <input type="tel" class="form-control" name="telephone" id="telephone" required>
    </div>

    <div class="form-group">
        <label for="metier_de_pere">Metier de Pere:</label>
        <input type="text" class="form-control" name="metier_de_pere" id="metier_de_pere" required>
    </div>

    <div class="form-group">
        <label for="metier_de_mere">Metier de Mere:</label>
        <input type="text" class="form-control" name="metier_de_mere" id="metier_de_mere" required>
    </div>

    <div class="form-group">
        <label for="bulletin_de_salaire">Bulletin de Salaire:</label>
        <input type="text" class="form-control" name="bulletin_de_salaire" id="bulletin_de_salaire" required>
    </div>

    <div class="form-group">
        <label for="filiere_ensam">Filiere EnsAM:</label>
        <input type="text" class="form-control" name="filiere_ensam" id="filiere_ensam" required>
    </div>

    <div class="form-group">
        <label for="niveau_ancienne">Niveau Ancienne:</label>
        <input type="text" class="form-control" name="niveau_ancienne" id="niveau_ancienne" required>
    </div>
    <div class="form-group">
    <label for="sexe">Sexe:</label><br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="sexe" id="homme" value="Homme" required>
        <label class="form-check-label" for="homme">Homme</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="sexe" id="femme" value="Femme" required>
        <label class="form-check-label" for="femme">Femme</label>
    </div>
</div>
    <div class="form-group">
        <label for="etablissement_ancienne">Etablissement Ancienne:</label>
        <input type="text" class="form-control" name="etablissement_ancienne" id="etablissement_ancienne" required>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>

</div>
@stop