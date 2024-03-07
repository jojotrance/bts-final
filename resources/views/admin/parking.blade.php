@extends('layouts.admin')

@section('body')
    <x-app-layout>
        <x-slot name="header">
        </x-slot>
        <style>

table thead {
    background-color: #3a5a40;
    color: white;
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
        height:auto;
        background:#e0e2e4 ;
        background: radial-gradient(white 30%, #e0e2e4 70%);

    }

            </style>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row mb-2 mt-5">
                        <div class="col-md-6">
                            <form action="{{ route('parking.create') }}" method="GET">
                                <button type="submit" class="btn btn-success custom-create-button">
                                    <i class="fas fa-plus"></i> Add Plate Number
                                </button>
                            </form>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('parking.clear') }}" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Clear History
                            </a>
                        </div>
                    </div>
                    <table class="table table-hover table-light">
                        <thead>
                            <tr>
                                <th scope="col">Plate Number</th>
                                <th scope="col">Parking Start</th>
                                <th scope="col">Parking End</th>
                                <th scope="col">Charge</th>
                                <th scope="col">Action</th> <!-- New column for the action -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parkings as $parking)
                            <tr>
                                <td>{{ $parking->plate_number }}</td>
                                <td>{{ $parking->parking_start }}</td>
                                <td>{{ $parking->parking_end }}</td>
                                <td>{{ $parking->charge }}</td>
                                <td>
                                    @if (!$parking->parking_end)
                                        <form action="{{ route('parking.update', ['id' => $parking->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-primary">Mark Parking as Done</button>
                                        </form>
                                    @else
                                        Parking Done
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </x-app-layout>
@endsection
