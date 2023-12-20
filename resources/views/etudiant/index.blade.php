@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'listes des etudiants')

@section('content_header')
@stop





@section('content')
<div class="container">


    <h2>liste etudiants inscripts</h2> <br>

    <a href="{{ route('etudiants.create') }}" class="btn btn-primary">ajouter etudiant</a><br> <br>
    <p><form action="{{ route('export.all.etudiants') }}" method="get">
            @csrf
            <button type="submit">Export All Etudiants to Excel</button>
        </form></p>

    <table class="table table-bordered" id="myTable">
        
        <thead>
            <tr>
                <th>cin</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>ville</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($etudiants as $etudiant)
            <tr>
                <td>{{ $etudiant->cni }}</td>
                <td>{{ $etudiant->nom }}</td>
                <td>{{ $etudiant->prenom }}</td>
                <td>{{ $etudiant->ville }}</td>

                <td class="d-flex justify-content-center align-items-center">
                    <a href="{{ route('etudiants.show', $etudiant->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>

                    <form action="{{ route('accept-student.store', $etudiant) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="fa fa-plus"></i>
                        </button>
                    </form>

                    <a class="btn btn-sm btn-warning mx-2" href="{{ route('etudiants.edit', $etudiant) }}" class="btn btn-primary"> <i class="fas fa-edit"></i></a>

                    <form method="post" action="{{ route('etudiants.destroy', $etudiant->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this etudiant?')"> <i class="fa fa-trash"></i></button>
                    </form>
                    <form action="{{ route('etudiants.export') }}" method="get">
                        @csrf
                        <button type="submit">Export Etudiants to Excel</button>
                    </form>
                  
                </td>z
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@section('js')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy',  'csv', 'pdf', 'print', 'colvis'
            ]
        });
    });
</script>

@stop



@stop