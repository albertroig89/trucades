@extends('layout')

@section('title', "Treballs")

@section('content')

    <div class="card pl-0 pr-0 col-md-12" >
        <div class="card-header"><h3>{{ $title }}</h3></div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <ul>
                @if ($calls->count())
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Empleat</th>
                            <th scope="col">Client</th>
                            <th scope="col">Nota</th>
                            <th scope="col">Ates per</th>
                            <th scope="col">Visualitzar detalls feina</th>
                            <th scope="col">Editar detalls feina</th>
                            <th scope="col">Eliminar feina</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($calls as $call)
                            <tr>
                                <th scope="row">{{ $call->created_at }}</th>
                                <td>{{ $call->user_id }}</td>
                                <td>{{ $call->client_id }}</td>
                                <td>{{ $call->callinf }}</td>
                                <td>{{ $call->user_id2 }}</td>
                                <td><a href="{{ route('calls.show', ['id' => $call->id]) }}"><span class="oi oi-eye"></span></a></td>
                                <td><a href="{{ route('calls.edit', ['id' => $call->id]) }}"><span class="oi oi-pencil"></span></a></td>

                                                                <td><form action="{{ route('calls.destroy', $call) }}" method="POST">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('DELETE') }}
                                                                        <button class="btn btn-link" type="submit"><span class="oi oi-trash"></span></button>
                                                                    </form></td>
                            </tr>
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




{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-8 col-md-offset-2">--}}
{{--            <div class="panel panel-default">--}}
{{--                <div class="panel-heading">Dashboard</div>--}}

{{--                <div class="panel-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    You are logged in!--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
