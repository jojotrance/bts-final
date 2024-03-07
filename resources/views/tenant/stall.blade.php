@extends('layouts.admin')
@section('body')
<x-app-layout>
    <x-slot name="header">
    </x-slot>
    @if ($stall)

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

    .rent-form{
      max-width: 500px;
      margin: 50px auto;
      padding: 30px;'
      background-color: transparent;
      color: #ffffff;
      border: 1px solid #ddd;
      border-radius: 5px;
      text-align: left;
    }

    .tenant-form{
      max-width: 500px;
      margin: 50px auto;
      padding: 30px;'
      background-color: transparent;
      color: #ffffff;
      border: 1px solid #ddd;
      border-radius: 5px;

    }
    </style>

    <div class ="rent-form">
        <h2>Rented Stall Information</h2>
        <div>
            <p><img src="{{ url($stall->img_path) }}" alt="Stall Image"</p>
            <p><strong>Codename:</strong> {{ $stall->codename }}</p>
            <p><strong>Description:</strong> {{ $stall->description }}</p>
            <p><strong>Status:</strong> {{ $stall->status }}</p>
            <p><strong>Rental Rate:</strong> {{ $stall->rental_rate }}</p>
            <a href="{{ route('tenant.feedback') }}" class="btn btn-primary">Submit a concern</a>
        </div>
    </div>
    @else
    <div>
        <p>No stall rented by this tenant.</p>
    </div>
    @endif

    @if ($payment)
    <div class="tenant-form">
        <h2>Tenant Payment Information</h2>
        <div>
            <p><strong>Amount to be Paid:</strong> {{ $payment->amount_to_be_paid }}</p>
            <p><strong>Amount Paid:</strong> {{ $payment->amount_paid }}</p>
            <p><strong>Balance:</strong> {{ $payment->balance }}</p>
        </div>
    </div>
    @else
    <div>
        <p>No payment information available for this tenant.</p>
    </div>
    @endif

</x-app-layout>
@endsection
