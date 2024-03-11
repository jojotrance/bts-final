@extends('layouts.adminstall')

@section('body')
   <x-app-layout>
    <x-slot name="header">
    </x-slot>

    @if(session('success'))
        <div class="container mt-2">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row mt-5 justify-content-center">
            <a class="btn btn-success custom-create-button" href="{{ route('stall.create') }}"> <i class="fas fa-plus"></i>Create Stall</a>
        </div>
    </div>

    <div class="container">
        <div class="row text-center py-5">
            @foreach ($stalls as $stall)
                <div class="col-md-3 col-sm-6 my-3 my-md-0">
                    <div class="card shadow custom-card">
                        <div class="card-body" style="background-color: #a3b18a">
                            <td><img src="{{ url($stall->img_path) }}" alt="stall image" width="50" height="50"></td>
                            <h5 class="card-title">{{ $stall->codename }}</h5>
                            <h6 class="card-title">{{ $stall->description }}</h6>
                            <h7 class="card-title">{{ $stall->status }}</h7>
                            <p></p>
                            <h8 class="card-title">{{ $stall->rental_rate }}</h8>
                        </div>
                        <div class="btn-group rounded-lg" role="group">
                            <a href="{{ route('stall.edit', $stall->id) }}" class="edit-btn mr-5 mb-3"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('stall.delete', $stall->id) }}" method="POST" class="delete-btn">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger delete-btn" onclick="return confirm('Are you sure you want to delete this stall?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
@endsection


