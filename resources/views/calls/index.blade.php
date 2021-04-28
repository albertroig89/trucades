@extends('layout')

@section('title', "Trucades")

@section('content')

    <div class="card pl-0 pr-0 col-md-12 mt-2" >
        <div class="card-header"><h3>{{ $title }}</h3></div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <ul>
                @if ($calls->count())
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Empleat</th>
                            <th scope="col">Client</th>
                            <th scope="col" class="w-50">Nota</th>
                            <th scope="col">Ates per</th>
                            <th scope="col">Comensar feina</th>
                            <th scope="col">Editar trucada</th>
                            <th scope="col">Eliminar trucada</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($calls as $call)
                            @include('layouts.partials.call')
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <li>No hi ha trucades pendents</li>
                @endif
            </ul>
        </div>
    </div>
@endsection
