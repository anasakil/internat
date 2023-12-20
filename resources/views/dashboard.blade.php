<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Dashboard</h1>

    <p>Total Employes: {{ $employe }}</p>
    <p>Total AcceptStudent: {{ $accept_student }}</p>

    <canvas id="EmployesChart"></canvas>
    <canvas id="AcceptStudentChart"></canvas>

    <script>
        var EmployesData = @json($chartData['Employes']);
        var AcceptStudentData = @json($chartData['AcceptStudent']);

        var EmployesChart = new Chart(document.getElementById('EmployesChart'), {
            type: 'bar',
            data: {
                labels: EmployesData.map(data => data.designation),
                datasets: [{
                    label: 'Employes',
                    data: EmployesData.map(data => data.count),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });

        var AcceptStudentChart = new Chart(document.getElementById('AcceptStudentChart'), {
            type: 'bar',
            data: {
                labels: AcceptStudentData.map(data => data.course),
                datasets: [{
                    label: 'AcceptStudent',
                    data: AcceptStudentData.map(data => data.count),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
    </script>
</body>
</html>