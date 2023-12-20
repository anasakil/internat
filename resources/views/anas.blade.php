@extends('adminlte::page')

@section('title', 'Accept Students')
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Accept Students</h1>
</section>

@section('content')
    <table id="myTable" class="table table-bordered">
        <thead>
            <tr>
                <th>cne</th>
                <th>Name</th>
                <th>prenom</th>
                <th>Action</th> <!-- Add a new column for the action button -->
            </tr>
        </thead>
        <tbody>
            @foreach ($acceptStudents as $acceptStudent)
                <tr>
                    <td>{{ $acceptStudent->cne }}</td>
                    <td>{{ $acceptStudent->nom }}</td>
                    <td>{{ $acceptStudent->prenom }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addChambreModal{{ $acceptStudent->id }}">
                            Add to Chambre
                        </button>

                        <!-- Modal for adding to Chambre -->
                        <div class="modal fade" id="addChambreModal{{ $acceptStudent->id }}" tabindex="-1" role="dialog" aria-labelledby="addChambreModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addChambreModalLabel">Add to Chambre</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('accept-student.add-chambre', ['id' => $acceptStudent->id]) }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="chambre_id">Choose a Chambre:</label>
                                                <select name="chambre_id" id="chambre_id" class="form-control">
                                                    @foreach ($chambres as $chambre)
                                                        <option value="{{ $chambre->id }}">{{ $chambre->id }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Add to Chambre</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'csv', 'pdf', 'print', 'colvis'
                ]
            });
        });
    </script>
@stop
