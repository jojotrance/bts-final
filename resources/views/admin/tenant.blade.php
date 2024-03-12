@extends('layouts.admin')
@section('body')
<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <style>
        body {
            background-image: url('/images/430837379_333900309104849_4293786303333364672_n.png');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            background-color: white; /* Add white background */
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-family: 'Roboto', sans-serif; /* Change font to Roboto */
        }

        table th {
            background-color: #3a5a40;
            color: white;
            font-weight: bold;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #ddd;
        }

        img {
            max-width: 50px;
            max-height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .actions {
            white-space: nowrap;
        }

        .actions a {
            margin-right: 5px;
        }

    </style>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Stall Codename</th>
                <th>Image</th>
                <th>Name</th>
                <th>Age</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Agreement</th>
                <th>Application</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tenants as $tenant)
            <tr>
                <td>{{ $tenant->stall->codename }}</td>
                <td><img src="{{ url($tenant->img_path) }}" alt="tenant image"></td>
                <td>{{ $tenant->user->name }}</td>
                <td>{{ $tenant->age }}</td>
                <td>{{ $tenant->contact_no }}</td>
                <td>{{ $tenant->address }}</td>
                <td>{{ $tenant->status }}</td>
                <td><a href="{{ url($tenant->leaseagreement) }}" target="_blank">View Agreement</a></td>
                <td class="actions">
                    <a href="{{ route('tenant.edit', $tenant->id) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
@endsection
