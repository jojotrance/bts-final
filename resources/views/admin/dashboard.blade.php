@extends('layouts.admin')

@section('body')
<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="alert alert-info" role="alert">
                Hello, {{ Auth::user()->name }}!
            </div>
        </div>
    </div>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Tenant Demographics by Address
                    </div>
                    <div class="card-body">
                        {!! $tenantByAddressChart->container() !!}
                    </div>
                </div>
            </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Parking Charges by Day
                    </div>
                    <div class="card-body">
                        {!! $parkingChargesChart->container() !!}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        User vs Tenant Count
                    </div>
                    <div class="card-body">
                        {!! $countChart->container() !!}
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

{!! $tenantByAddressChart->script() !!}
{!! $parkingChargesChart->script() !!}
{!! $countChart->script() !!}
@endsection
