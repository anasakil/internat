@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('title', 'Employes List')
@section('content_header')
@section('content')
<a href="{{ route('chambres.create') }}" class="btn btn-success">Crée Chambre</a>
<p></p><br>
<div class="row">
    @foreach($chambres as $chambre)
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title">N:chambre: {{ $chambre->id }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">Batiment: {{ $chambre->batiment ? $chambre->batiment->nom : 'N/A' }}</p>
                <h6>Étudiants dans cette chambre:</h6>
                <ul>
                    @foreach ($chambre->acceptStudents as $acceptStudent)
                    <li>{{ $acceptStudent->nom }} {{ $acceptStudent->prenom }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div>
@stop






