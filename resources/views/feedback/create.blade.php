@extends('layouts.createstall')
@section('body')
<x-app-layout>
    <x-slot name="header">
    </x-slot>
<div class="container mt-4">
    <h1>Create Stalls</h1>
    <div class="container">
        <form action="{{ route('feedback.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="tenant_id" value="{{ $tenantId }}">
            <div class="form-group">
                <label for="reason">Reason: </label>
                <input type="text" class="form-control" name="reason" required>
            </div>
            <div class="form-group">
                <label for="suggestion">Suggestion: </label>
                <input type="text" class="form-control" name="suggestion" required>
            </div>
            <div class="form-group">
                <label for="img_path">Images: </label>
                <input type="file" class="form-control-file" name="img_path" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</x-app-layout>
@endsection
