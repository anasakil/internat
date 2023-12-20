@extends('adminlte::page')

@section('title', 'Accept Students')
@section('plugins.Datatables', true)

@section('content_header')
<h1>Accept Students</h1>
@stop

@section('content')
<table id="myTable" class="table table-bordered">
    <thead>
        <tr>
            <th>cne</th>
            <th>Name</th>
            <th>prenom</th>
            <th>Action</th>
            <th>affecter</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($acceptStudents as $acceptStudent)
        <tr>
            <td>{{ $acceptStudent->cne }}</td>
            <td>{{ $acceptStudent->nom }}</td>
            <td>{{ $acceptStudent->prenom }}</td>
            <td>
                
    <form action="{{ route('accept-students.destroy', $acceptStudent->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')"><i class="fa fa-trash"></i></button>
    </form>
            </td>
            <td>
    <form action="{{ route('assign-chambre', $acceptStudent->id) }}" method="POST">
        @csrf
        <div class="form-inline">
            <select class="form-control" name="chambre_id">
                @foreach ($chambres as $chambre)
                <option value="{{ $chambre->id }}">{{ $chambre->id }}</option>
                @endforeach
            </select>
            <button class="btn btn-success" type="submit">Affecter</button>
        </div>
        <td>
                    <form method="POST">
                        @csrf
                        <button class="btn btn-info" type="submit">
                            <i class="fa fa-envelope"></i> Send SMS
                        </button>
                    </form>
                </td>
    </form>
</td>
            
        </tr>
        @endforeach
    </tbody>
</table>
</div>



@stop

@section('js')
<script>
    let selectedCNE;

    $(document).ready(function() {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'csv', 'pdf', 'print', 'colvis'
            ]
        });
    });
</script>
@stop