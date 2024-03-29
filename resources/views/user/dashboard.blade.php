@extends('layouts.adminstall')
@section('body')
   <x-app-layout>
    <x-slot name="header">
    </x-slot>
<style>
    body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: #344e41;
    }

    .container {
        max-width: 100%;
        margin: 0 auto;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center; /* Center vertically */
        align-items: center; /* Center horizontally */
        height: 100vh; /* Set container height to full viewport height */
    }

    .image-section {
        padding: 30px;
        background-color: transparent;
        color: white;
        text-align: center;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .image-section img {
        display: block;
        margin: 0 auto 20px;
        max-width: 100%;
        height: auto;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .about-section {
        padding: 20px;
        background-color: transparent;
        color: white;
        text-align: left;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .about-section h1 {
        margin-top: 0;
        font-size: 36px;
        font-weight: 700;
    }

    .about-section p {
        margin-bottom: 20px;
        line-height: 1.6;
        font-size: 20px;
    }

    .button-section {
        margin-top: auto;
        text-align: right;
    }

    .button-section button {
        padding: 15px 30px;
        background-color: #2ecc71;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 24px;
        transition: background-color 0.3s;
    }

    .button-section button:hover {
        background-color: #27ae60;
    }
</style>

<body>
<div class="container">
    <div class="image-section">
        <img src="{{ asset('images/market.png') }}" alt="stall image" width="600" height="600">
    </div>
    <div class="about-section">
        <h1>Taguig People's Market</h1>
        <p>It is a marketplace located in Lower Bicutan, Taguig City. A wide variety of products are sold here, from school and office supplies to plasticware to clothes to fresh produce. This place is a go-to for all individuals to find needs, whether it be for everyday life or one-time use.</p>
    </div>
    <div class="button-section">
        <button onclick="location.href='{{ route('user.index') }}'">
            Proceed
        </button>
    </div>
</div>
</x-app-layout>
@endsection
