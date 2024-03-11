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
                    <th scope="col">Stall Image</th>
                    <th scope="col">Stall Codename</th>
                    <th scope="col">Stall Status</th>
                    <th scope="col">Lease Agreement</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventories as $stall)
                    <tr>
                        <td><img src="{{ url($stall->image) }}" alt="{{ $stall->codename }}" width="50" height="50"></td>
                        <td>{{ $stall->codename }}</td>
                        <td>{{ $stall->status }}</td>
                        <td>
                            <a href="{{ route('inventory.edit', $stall->inventory->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-app-layout>
@endsection
