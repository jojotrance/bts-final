@extends('layouts.admin')

@section('body')
    <x-app-layout>
        <x-slot name="header">
        </x-slot>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">Stall Codename</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Agreement</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventories as $inventory)
                    <tr>
                        <td>{{ $inventory->codename }}</td>
                        <td><img src="{{ asset($inventory->img_path) }}" alt="stall image" width="50" height="50"></td>
                        <td>{{ $inventory->tenant->user->name }}</td>
                        <td>{{ $inventory->status }}</td>
                        <td><a href="{{ asset($inventory->tenant->leaseagreement) }}" target="_blank">View Agreement</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-app-layout>
@endsection
