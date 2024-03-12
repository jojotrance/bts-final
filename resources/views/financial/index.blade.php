<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <style>
    .clock-icon {
        margin-left: 50px;
    }

    .custom-delete-button{
        background-color: red !important;
    }

    table thead {
        background-color: #3a5a40;
        color: white;
    }

    body {
        background-size: cover;
        background-position: center;
        height: 100vh;
        margin: 0;
        padding: 0;
    }
    </style>
<x-app-layout>
    <x-slot name="header">
    </x-slot>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Financial Records
                    <a href="{{ route('financial.create') }}" class="btn btn-primary float-right">Create</a>
                </div>

                <div class="card-body">
                    @if ($financials->count() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($financials as $financial)
                            <tr>
                                <td>{{ $financial->amount }}</td>
                                <td>{{ $financial->type }}</td>
                                <td>{{ $financial->description }}</td>
                                <td>{{ $financial->date }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>No financial records found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="row justify-content-center mt-4">
    <div class="col-md-8">
    <div class="card">
    <div class="card-header">
    Financial Overview
    </div>
    <div class="card-body">
    <div>
    <canvas id="financialChart" width="400" height="200"></canvas>
    </div>
    <script>
    var ctx = document.getElementById('financialChart').getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
    labels: {!! json_encode($chartData['labels']) !!},
    datasets: [{
    label: 'Amount',
    data: {!! json_encode($chartData['data']) !!},
    backgroundColor: [
    'rgba(54, 162, 235, 0.2)',
    'rgba(255, 99, 132, 0.2)'
    ],
    borderColor: [
    'rgba(54, 162, 235, 1)',
    'rgba(255, 99, 132, 1)'
    ],
    borderWidth: 1
    }]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }]
    }
    }
    });
    </script>
</div>
</div>
</div>
</div>
</div>
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <form action="{{ route('generate.financial') }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary">Generate PDF</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

