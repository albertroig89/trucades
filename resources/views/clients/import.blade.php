@extends('layout')

@section('title', "Importacio d'usuaris")

@section('content')

    <div class="card pl-0 pr-0 col-md-4 mt-2">
        <div class="card-header"><h3>{{ $title }}</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ url('clientes') }}">
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-primary">Importar</button>
                <form>

@endsection
