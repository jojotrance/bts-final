@extends('layouts.editstall')
@section('body')
<x-app-layout>
    <x-slot name="header">
    </x-slot>
</x-app-layout>

<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #718355;
        }

        .container {
            margin-top: 50px;
            background-color: #b5c99a;
        }

        form {
            width: 75%;
            height: 75%;
            background-color: #b5c99a;
            padding: 20px;2
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input,
        button {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #f18973;
            color: #fff;
            border: 1px solid #f18973;
        }

        .btn-primary:hover {
            background-color: #f18973;
            color: #fff;
            border: 1px solid #f18973;
        }
   </style>
   <div class="container mt-4">
    <h1>Edit Stalls</h1>
    {{-- {{dd($listener)}} --}}

    <div class="container">
  {!! Form::model($stall, ['route' => ['stall.update', $stall->id], 'class' => 'form-horizontal', 'files' => true, 'method' => 'put']) !!}

  <div class="form-group">
    {{ Form::label('codename', 'Codename:', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
      {!! Form::text('codename', null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('description', 'Description:', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
      {!! Form::text('description', null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('status', 'Status:', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
      {!! Form::text('status', null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('rental_rate', 'Rental Rate:', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
      {!! Form::text('rental_rate', null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('img_path', 'Upload Image:', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
      {!! Form::file('img_path', ['class' => 'form-control']) !!}
      @error('img_path')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <img src="{{ url($stall->img_path) }}" alt="stall image" width="50" height="50">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    </div>
  </div>

  {!! Form::close() !!}
</div>
@endsection
