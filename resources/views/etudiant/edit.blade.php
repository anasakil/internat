@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('title', 'Edit Etudiant')
@section('content_header')
@stop

@section('content')
<div class="container">
    <h2>Edit Etudiant</h2>
    <form method="POST" action="{{ route('etudiants.update', ['id' => $etudiant->id]) }}">
    @csrf
    @method('PUT')
   

        <div class="row my-5">
            <div class="col-md-6 mx-auto">
                @include('layouts.alert')
            </div>
        </div>

        <!-- Include all the input fields similar to your create form -->
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" name="nom" id="nom" value="{{ old('nom', $etudiant->nom) }}" required>
        </div>
        <div class="form-group">
    <label for="prenom">Prenom:</label>
    <input type="text" class="form-control" name="prenom" id="prenom" value="{{ old('prenom', $etudiant->prenom) }}" required>
</div>

<!-- Repeat this pattern for other fields -->
<div class="form-group">
    <label for="age">Age:</label>
    <input type="number" class="form-control" name="age" id="age" value="{{ old('age', $etudiant->age) }}" required>
</div>

<div class="form-group">
    <label for="adresse">Adresse:</label>
    <input type="text" class="form-control" name="adresse" id="adresse" value="{{ old('adresse', $etudiant->adresse) }}" required>
</div>

<div class="form-group">
    <label for="date_naissance">Date de Naissance:</label>
    <input type="date" class="form-control" name="date_naissance" id="date_naissance" value="{{ old('date_naissance', $etudiant->date_naissance) }}" required>
</div>

<div class="form-group">
    <label for="ville">Ville:</label>
    <input type="text" class="form-control" name="ville" id="ville" value="{{ old('ville', $etudiant->ville) }}" required>
</div>
<div class="form-group">
    <label for="cne">CNE:</label>
    <input type="text" class="form-control" name="cne" id="cne" value="{{ old('cne', $etudiant->cne) }}" required>
</div>

<div class="form-group">
    <label for="cni">CNI:</label>
    <input type="text" class="form-control" name="cni" id="cni" value="{{ old('cni', $etudiant->cni) }}" required>
</div>

<div class="form-group">
    <label for="filiere_ensam">Filiere EnsAM:</label>
    <input type="text" class="form-control" name="filiere_ensam" id="filiere_ensam" value="{{ old('filiere_ensam', $etudiant->filiere_ensam) }}" required>
</div>

<div class="form-group">
    <label for="niveau_ensam">Niveau EnsAM:</label>
    <input type="text" class="form-control" name="niveau_ensam" id="niveau_ensam" value="{{ old('niveau_ensam', $etudiant->niveau_ensam) }}" required>
</div>
<div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $etudiant->email) }}" required>
</div>

<div class="form-group">
    <label for="telephone">Telephone:</label>
    <input type="tel" class="form-control" name="telephone" id="telephone" value="{{ old('telephone', $etudiant->telephone) }}" required>
</div>

<div class="form-group">
    <label for="metier_pere">Metier de Pere:</label>
    <input type="text" class="form-control" name="metier_pere" id="metier_pere" value="{{ old('metier_pere', $etudiant->metier_pere) }}" required>
</div>

<div class="form-group">
    <label for="metier_mere">Metier de Mere:</label>
    <input type="text" class="form-control" name="metier_mere" id="metier_mere" value="{{ old('metier_mere', $etudiant->metier_mere) }}" required>
</div>

<div class="form-group">
    <label for="bulletin_salaire">Bulletin de Salaire:</label>
    <input type="file" class="form-control-file" name="bulletin_salaire" id="bulletin_salaire">
</div>

<div class="form-group">
    <label for="sexe">Sexe:</label>
    <select class="form-control" name="sexe" id="sexe" required>
        <option value="M" {{ old('sexe', $etudiant->sexe) === 'HEMME' ? 'selected' : '' }}>HOMME</option>
        <option value="F" {{ old('sexe', $etudiant->sexe) === 'FEMME' ? 'selected' : '' }}>FEMME</option>
    </select>
</div>


<div class="form-group">
    <label for="filiere_ancienne">Filiere Ancienne:</label>
    <input type="text" class="form-control" name="filiere_ancienne" id="filiere_ancienne" value="{{ old('filiere_ancienne', $etudiant->filiere_ancienne) }}" required>
</div>

<div class="form-group">
    <label for="niveau_ancienne">Niveau Ancienne:</label>
    <input type="text" class="form-control" name="niveau_ancienne" id="niveau_ancienne" value="{{ old('niveau_ancienne', $etudiant->niveau_ancienne) }}" required>
</div>

<div class="form-group">
    <label for="moyen_ancienne">Moyen Ancienne:</label>
    <input type="number" step="0.01" class="form-control" name="moyen_ancienne" id="moyen_ancienne" value="{{ old('moyen_ancienne', $etudiant->moyen_ancienne) }}" required>
</div>

<div class="form-group">
    <label for="etablissement_ancienne">Etablissement Ancienne:</label>
    <input type="text" class="form-control" name="etablissement_ancienne" id="etablissement_ancienne" value="{{ old('etablissement_ancienne', $etudiant->etablissement_ancienne) }}" required>
</div>



        <button type="submit" class="btn btn-primary">
            {{ __('Update') }}
        </button>
    </form>
</div>
@stop
