@extends('layouts.adminstall')
@section('body')
   <x-app-layout>
    <x-slot name="header">
    </x-slot>
<style>
    .about-section {
        padding: 50px;
        text-align: right;
        background-color: #344e41;
        color: white;
        font-family: "Times New Roman", Arial, sans-serif;
    }

    .image-section {
        padding: 50px;
        text-align: left;
        background-color: #344e41;
        color: white;
        font-family: "Times New Roman", Arial, sans-serif;
    }

    .button-section {
        text-align: center;
        margin-top: 20px;
    }

    .button-section button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .button-section button:hover {
        background-color: #45a049;
    }
</style>

<body>
<div class="image-section">
    <img src="{{ asset('images/market.png') }}" alt="stall image" width="300" height="300">
    <div class="about-section">
        <h1>Taguig People's Market</h1>
        <p> It is a marketplace located in Lower Bicutan, Taguig City. </p>
        <p> A wide variety of products are sold here, from school and office supplies to plasticware to clothes to fresh produce name it! <br>This place screams "General Merchandise".
            This is a go-to place for all individuals to find needs, may it be in everyday life or a one-time use. </p>
    </div>
</div>
<div class="button-section">
    <button onclick="location.href='{{ route('user.index') }}'">
        Proceed
    </button>
</div>
</x-app-layout>
@endsection
