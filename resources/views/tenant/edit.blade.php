@extends('layouts.admin')
@section('body')
<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Tenant</div>

                    <div class="card-body">
                        <form action="{{ route('tenant.update', $tenant->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" value="{{ $tenant->user->name }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>

                                <div class="col-md-6">
                                    <input id="age" type="text" class="form-control" name="age" value="{{ $tenant->age }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contact_no" class="col-md-4 col-form-label text-md-right">Contact Number</label>

                                <div class="col-md-6">
                                    <input id="contact_no" type="text" class="form-control" name="contact_no" value="{{ $tenant->contact_no }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" value="{{ $tenant->address }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

                                <div class="col-md-6">
                                    <select id="status" class="form-control" name="status">
                                        <option value="pending" {{ $tenant->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="accepted" {{ $tenant->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                        <option value="rejected" {{ $tenant->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection
