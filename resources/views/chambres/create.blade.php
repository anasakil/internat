@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Employes List')

@section('content_header')
@stop

@section('content')
    <h1>CREE Chambre</h1>

    <form action="{{ route('chambres.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="numbre">N: CHAMBRE:</label>
        <input type="text" name="numbre" id="numbre" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="gender">SEXE</label>
        <select name="gender" id="gender" class="form-control" required>
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
        </select>
    </div>

    <div class="form-group">
        <label for="capacity">Capacity:</label>
        <input type="number" name="capacity" id="capacity" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="batiment_id">Batiment:</label>
        <select name="batiment_id" id="batiment_id" class="form-control" required>
            @foreach($batiments as $batiment)
                <option value="{{ $batiment->id }}">{{ $batiment->nom }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Cree</button>
</form>

@stop    
