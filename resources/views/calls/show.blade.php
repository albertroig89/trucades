@extends('layout')

@section('title', "{$call->client->name}")

@section('content')

    <div class="card pl-0 pr-0 col-md-3 mt-2" >
        <div class="card-header"><h3>Trucada: {{ $call->client->name }}</h3></div>
        <div class="card-body">

            <p>Empleat: {{ $call->user->name }}</p>
            <p>Correu electronic: {{ $call->client->email }}</p>
            <p>Info: {{ $call->callinf }}</p>
            <p>Inici: @include('layouts.partials.datetimepicker')</p>
            <p>Finalització @include('layouts.partials.datetimepicker')</p>
            <p><a href="{{ route('home') }}">Regresar al listado de usuarios</a></p>
        </div>
    </div>

@endsection
