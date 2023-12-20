@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card bg-info">
            <div class="card-body text-center">
                <h3>{{ \App\Models\Chambre::count() }}</h3>
                <p>Number of Chambres</p>
                <a href="{{ url('admin/chambres') }}" class="btn btn-primary">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-info">
            <div class="card-body text-center">
                <h3>{{\App\Models\Etudiant::count()}}</h3>
                <p>LISTES ETUDIANTS</p>
                <a href="{{url('admin/etudiants')}}" class="btn btn-primary">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-info">
            <div class="card-body text-center">
                <h3>{{\App\Models\AcceptStudent::count()}}</h3>
                <p>Liste etudiants affecter</p>
                <a href="{{url('admin/accept-student')}}" class="btn btn-primary">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
    <div >
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header">Diagramme circulaire de répartition des étudiants</div>
                <div class="card-body">
                    <canvas id="etudiantPieChart"></canvas>
                </div>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('etudiantPieChart').getContext('2d');
    var data = {
        labels: [ 'etudiants inscripts','Etudiants affecter'],
        datasets: [{
            data: [@json($etudiantCount), @json($acceptStudentCount)],
            backgroundColor: ['#33FF45', '#FF5733'],
        }]
    };

    var chart = new Chart(ctx, {
        type: 'pie',
        data: data,
    });
</script>

</div>






@stop

@section('css')

@stop

@section('js')

@stop
