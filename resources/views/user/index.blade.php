@extends('layouts.adminstall')
@section('body')
   <x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="{{ route('user.filter') }}" method="GET" class="d-flex justify-content-between align-items-center">
                <div class="form-check">
    <input class="form-check-input" type="radio" name="status" id="rented" value="Rented">
    <label class="form-check-label" for="rented"><strong>Rented</strong></label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="status" id="for-rent" value="For Rent">
    <label class="form-check-label" for="for-rent"><strong>For Rent</strong></label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" name="status" id="maintenance" value="Maintenance">
    <label class="form-check-label" for="maintenance"><strong>Maintenance</strong></label>
</div>
    
                    <button type="submit" class="btn btn-primary">Apply Filter</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            @foreach ($stalls as $stall)
            <div class="col-md-3 col-sm-12 my-3">
                <div class="card shadow custom-card">
                    <div class="card-body">
                        <img src="{{ url($stall->img_path) }}" alt="stall image" class="img-fluid mb-3">
                        <h5 class="card-title">{{ $stall->codename }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $stall->description }}</h6>
                        <p class="card-text">Status: <strong>{{ $stall->status }}</strong></p>
                        <p class="card-text">Rent Cost: ₱{{ $stall->rental_rate  }}</p>
                        @php
                            $acceptedTenant = Auth::user()->tenant()->where('status', 'accepted')->first();
                        @endphp
                        @if (!$acceptedTenant)
                            @if ($stall->status !== 'Maintenance' && $stall->status !== 'Rented')
                               <center> <a href="{{ route('tenant.create', ['stallId' => $stall->id]) }}" class="btn btn-success">Apply</a></center>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout> 
@endsection
