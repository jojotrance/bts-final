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
      }

    img {
        max-width: 100%;
        height: 100%;
        height:auto;
        background:#e0e2e4 ;
        background: radial-gradient(white 30%, #e0e2e4 70%);

    }
        table thead {
    background-color: #3a5a40;
    color: white;
  }
        </style>
    <table class="table table-hover table-light">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">To be Paid</th>
                <th scope="col">Amount Paid</th>
                <th scope="col">Balance</th>
                <th scope="col">Action</th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>
                    <td>{{ $payment->tenant->user->name }}</td>
                    <td>{{ $payment->amount_to_be_paid }}</td>
                    <td>{{ $payment->amount_paid }}</td>
                    <td>{{ $payment->balance }}</td>
                    <td>
                        <a href="{{ route('payment.edit', $payment->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
@endsection
