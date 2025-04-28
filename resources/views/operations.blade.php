@extends('layouts.base')
@section('content')
    <div class="text-center my-3">
        <img src="{{ asset('assets/images/logo.jpg') }}" alt="logo" class="img-fluid" width="250px">
    </div>

    <!-- operations -->
    <div class="container">

        <hr>

        <div class="row">

            <!-- each operation -->
            @foreach($exercises as $exercise)
                <x-card-exercise :number="$exercise['exercise_number']" :exercise="$exercise['exercise']" />
            @endforeach
        </div>

        <hr>
    <!-- print version -->
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <a href="{{ route('home') }}" class="btn btn-primary px-5">VOLTAR</a>
            </div>
            <div class="col text-end">
                <a href="{{ route('export-exercises') }}" class="btn btn-secondary px-5">DESCARREGAR EXERCÍCIOS</a>
                <a href="{{ route('print-exercises') }}" class="btn btn-secondary px-5">IMPRIMIR EXERCÍCIOS</a>
            </div>
        </div>
    </div>
@endsection