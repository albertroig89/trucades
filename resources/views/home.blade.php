@extends('layout')

@section('title', "Trucades")

@section('content')
    <div class="card pl-0 pr-0 col-md-12 mt-2" >
        <div class="card-header">
            <h3>
                {{ $title }}
                <form class="float-right" method="POST" action="{{ url('llamadas') }}">
                    <select class="form-control" name="user_id" id="user_id">
                        <option class="form-control" value="{{ auth()->id() }}">{{ auth()->user()->name }}</option>
                        <option class="form-control" value="0">Totes les trucades</option>
                        @foreach ($users as $user)
                            @if (auth()->id() != $user->id))
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
                @if($userCalls->count() or $globalCalls->count())
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
                            @if (auth()->user()->department_id === $techId)
                                @foreach ($calls as $call)
                                    @if (auth()->id() === $call->user_id)
                                        @include('layouts.partials.call')
                                    @endif
                                @endforeach
                                @foreach ($calls as $call)
                                    @if ($globId === $call->user->department_id)
                                        @include('layouts.partials.call')
                                    @endif
                                @endforeach
                            @else
                                @foreach ($calls as $call)
                                    @if (auth()->id() === $call->user_id)
                                        @include('layouts.partials.call')
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                @else
                    <li>No tens trucades pendents</li>
                @endif
            </ul>
        </div>
    </div>
@endsection
