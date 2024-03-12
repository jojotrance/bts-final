@extends('layouts.admin')
@section('body')
<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5" style="padding:20px;">
                <div class="card">
                    <div class="card-header"> Financial Records </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="{{ route('financial.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="text" class="form-control" name="amount" required>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <select class="form-control" name="type" required>
                    <option value="expense">Expense</option>
                    <option value="income">Income</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" required>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" name="date" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-app-layout>
@endsection
