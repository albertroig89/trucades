@extends('layout')

@section('title', "Trucades")

@section('content')
    <div class="card pl-0 pr-0 col-md-12 mt-2" >
        <div class="card-header">
            <h3>
                {{ $title }}
                <form class="float-right" method="GET" action="{{ url('/') }}">
                    <select class="form-control" onchange="this.form.submit()" name="user_id" id="user_id">
                        @if ($allcalls == true)
                            <option class="form-control" value="100">Totes les trucades</option>
                        @else
                            <option class="form-control" value="{{ $usuari->id }}">{{ $usuari->name }}</option>
                            <option class="form-control" value="100">Totes les trucades</option>
                        @endif
                        @foreach ($users as $user)
                            @if (auth()->id() != $user->id)
                                <option class="form-control" value="{{ $user->id }}">{{ $user->name }}</option>
                            @elseif ($allcalls == true)
                                <option class="form-control" value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach

                    </select>
                </form>
                <a class="float-right afegirlink" href="{{ route('calls.create') }}"><img class="afegir" src="{{ asset('/images/afegir.png') }}"/></a>
            </h3></div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <ul>
                @if($calls->count())
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Empleat</th>
                            <th scope="col">Client</th>
                            <th scope="col" class="nota">Nota</th>
                            <th scope="col">Telèfon</th>
                            <th scope="col">Ates per</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($calls as $call)
                                @include('layouts.partials.call')
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <li>No tens trucades pendents</li>
                @endif
            </ul>
        </div>
    </div>
@endsection
