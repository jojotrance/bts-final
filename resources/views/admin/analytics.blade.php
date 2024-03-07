@extends('layouts.admin')
@section('body')
<x-app-layout>
    <x-slot name="header">
    </x-slot>
<style>

.card-header-colored {
  background-color: #3a5a40;
  color: white;
  padding: 10px;
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
        height:auto;
        background:#e0e2e4 ;
        background: radial-gradient(white 30%, #e0e2e4 70%);

    }

</style>
        <div class="container">
            <div class="row">
                <!-- Tenant Demographics by Address Chart -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-colored">Tenant Demographics by Address</div>
                        <div class="card-body">
                            {!! $tenantByAddressChart->container() !!}
                        </div>
                    </div>
                </div>

                <!-- Stall Statuses Chart -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-colored">Stall Statuses</div>
                        <div class="card-body">
                            {!! $stallStatusesChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <!-- User vs Tenant Count Chart -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-colored">User vs Tenant Count</div>
                        <div class="card-body">
                            {!! $countChart->container() !!}
                        </div>
                    </div>
                </div>

                <!-- Parking Charges by Day Chart -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-colored">Parking Charges by Day</div>
                        <div class="card-body">
                            {!! $parkingChargesChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart scripts -->
        {!! $tenantByAddressChart->script() !!}
        {!! $stallStatusesChart->script() !!}
        {!! $countChart->script() !!}
        {!! $parkingChargesChart->script() !!}
    </x-app-layout>
@endsection
