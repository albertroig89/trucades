@extends('layout')

@section('title', "Usuario {$user->id}")

@section('content')

    <div class="card pl-0 pr-0 col-md-3 mt-2" >
        <div class="card-header"><h3>Trucada #{{ $call->name }}</h3></div>
        <div class="card-body">


            <p>Empleat: {{ $call->user->name }}</p>
            <p>Correo electronico: {{ $call->email }}</p>
            @empty($user->department_id)
                <p>No tiene profession</p>
            @else
                <p>Profession: {{ $user->department->title }}</p>
            @endempty
            <p><a href="{{ route('users.index') }}">Regresar al listado de usuarios</a></p>
        </div>
    </div>

@endsection
