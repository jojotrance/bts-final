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
            height: auto;
            background: #e0e2e4;
            background: radial-gradient(white 30%, #e0e2e4 70%);
        }

    </style>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">Stall Codename</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Address</th>
                <th scope="col">Agreement</th>
                <th scope="col">Application</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tenants as $tenant)
            <tr>
                <td>
                    {{ $tenant->stall->codename }}
                </td>
                <td><img src="{{ url($tenant->img_path) }}" alt="tenant image" width="50" height="50"></td>
                <td>{{ $tenant->user->name }}</td>
                <td>{{ $tenant->age }}</td>
                <td>{{ $tenant->contact_no }}</td>
                <td>{{ $tenant->address }}</td>
                <td>{{ $tenant->status }}</td>
                <td><a href="{{ url($tenant->leaseagreement) }}" target="_blank">View Agreement</a></td>
                <td>
                    <a href="{{ route('tenant.edit', $tenant->id) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
@endsection
