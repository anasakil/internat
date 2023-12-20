@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('title', 'Employes List')
@section('content_header')

@section('content')
    <div class="container">
        <h1>Batiments  </h1> <p>zohra pour les femmes </p><p>atlas pour les hommes</p>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Chambres</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($batiments as $batiment)
                    <tr>
                        <td>{{ $batiment->id }}</td>
                        <td>{{ $batiment->nom }}</td>
                        <td>
                            @foreach ($batiment->chambres as $chambre)
                                {{ $chambre->id }}|
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@stop
