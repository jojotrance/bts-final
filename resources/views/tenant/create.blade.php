@extends('layouts.createstall')
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
    <div class="container mt-4">
        <h1>Application for Rental</h1>
        <div class="container">
            <h3>Hi {{ Auth::user()->name }}, please fill out the necessary information:</h3>
            <div class="form-group">
                <a href="{{ Storage::url('public/images/lease-agreement.docx') }}" target="_blank">
                    <i class="fas fa-file-download"></i> Download Lease Agreement
                </a>
            </div>
                <form method="POST" action="{{ route('tenant.store', ['stallId' => request()->query('stallId')]) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="stallId" value="{{ request()->query('stallId') }}">
                <div class="form-group">
                    <label for="age">Age: </label>
                    <input type="text" class="form-control" name="age" required>
                </div>
                <div class="form-group">
                    <label for="contact_no">Contact No: </label>
                    <input type="text" class="form-control" name="contact_no" required>
                </div>
                <div class="form-group">
                    <label for="address">Address: </label>
                    <input type="text" class="form-control" name="address" required>
                </div>
                <div class="form-group">
                    <label for="leaseagreement">Upload Signed Lease Agreement (PDF): </label>
                    <input type="file" class="form-control-file" name="leaseagreement" required>
                </div>
                <div class="form-group">
                    <label for="img_path">Upload Image: </label>
                    <input type="file" class="form-control-file" name="img_path" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
@endsection
