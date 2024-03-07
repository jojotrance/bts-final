@extends('layouts.admin')

@section('body')
<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="container">
        <h2>Feedback</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Tenant Name</th>
                    <th>Feedback Reason</th>
                    <th>Suggestion</th>
                    <th>Stall Name</th>
                    <th>Stall Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->tenant->name }}</td>
                        <td>{{ $feedback->reason }}</td>
                        <td>{{ $feedback->suggestion }}</td>
                        <td>
                            @if ($feedback->tenant->stall)
                                {{ $feedback->tenant->stall->name }}
                            @else
                                No Stall Assigned
                            @endif
                        </td>
                        <td>
                            @if ($feedback->tenant->stall)
                                <img src="{{ $feedback->tenant->stall->img_path }}" alt="Stall Image" style="width: 50px; height: 50px;">
                            @else
                                No Stall Assigned
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
@endsection
