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
<x-app-layout>
    <x-slot name="header">
    </x-slot>
<body>
    <style>
        .card-header-colored {
            background-color: #3a5a40;
            color: white;
            padding: 10px;
        }

        body {
            background-image: url('/images/430837379_333900309104849_4293786303333364672_n.png');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        img {
            max-width: 100%;
            height: 100%;
            height: auto;
            background: #e0e2e4;
            background: radial-gradient(white 30%, #e0e2e4 70%);
        }

        @font-face {
        font-family: 'FontAwesome';
        src: url('path/to/font_awesome.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
        }

        .fa {
            font-family: 'FontAwesome', sans-serif;
        }
    </style>
</head>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-colored">Tenant Demographics by Address</div>
                    <div class="card-body">
                        {!! $tenantByAddressChart->container() !!}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-colored">Stall Statuses</div>
                    <div class="card-body">
                        {!! $stallStatusesChart->container() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-colored">User vs Tenant Count</div>
                    <div class="card-body">
                        {!! $countChart->container() !!}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-colored">Parking Charges by Day</div>
                    <div class="card-body">
                        {!! $parkingChargesChart->container() !!}
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row mt-4">
            <div class="col-md-12 text-center">
                <form action="{{ route('generate.analytics') }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary">Generate PDF</button>
                </form>
            </div>
        </div>
    </div> --}}

    {!! $tenantByAddressChart->script() !!}
    {!! $stallStatusesChart->script() !!}
    {!! $countChart->script() !!}
    {!! $parkingChargesChart->script() !!}
</x-app-layout>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
