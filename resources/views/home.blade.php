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
                            @if ($call->user->department_id === $techId or $call->user->department_id === $globId)
                                @if (auth()->id() === $call->user_id or $call->user_id === 1)
                                    @if ($call->stat->id === 1)

                                        <tr bgcolor="#f0e68c">
                                            <th scope="row">{{ $call->created_at }}</th>
                                            <td>{{ $call->user->name }}</td>
                                            <td>{{ $call->client->name }}</td>
                                            <td>{{ $call->callinf }}</td>
                                            <td>{{ $call->user_id2 }}</td>
                                            <td><a href="{{ route('calls.show', ['call' => $call]) }}"><span class="oi oi-eye"></span></a></td>
                                            <td><a href="{{ route('calls.edit', ['call' => $call]) }}"><span class="oi oi-pencil"></span></a></td>

                                                                            <td><form action="{{ route('calls.destroy', $call) }}" method="POST">
                                                                                    {{ csrf_field() }}
                                                                                    {{ method_field('DELETE') }}
                                                                                    <button class="btn btn-link" type="submit"><span class="oi oi-trash"></span></button>
                                                                                </form></td>
                                        </tr>
                                    @elseif ($call->stat->id === 2)
                                        <tr bgcolor="#fa8072">
                                            <th scope="row">{{ $call->created_at }}</th>
                                            @empty($call->user_id)
                                                <td>No te empleat</td>
                                            @else
                                                <td>{{ $call->user->name }}</td>
                                            @endempty
                                            <td>{{ $call->client->name }}</td>
                                            <td>{{ $call->callinf }}</td>
                                            <td>{{ $call->user_id2 }}</td>
                                            <td><a href="{{ route('calls.show', ['call' => $call]) }}"><span class="oi oi-eye"></span></a></td>
                                            <td><a href="{{ route('calls.edit', ['call' => $call]) }}"><span class="oi oi-pencil"></span></a></td>

                                            <td><form action="{{ route('calls.destroy', $call) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-link" type="submit"><span class="oi oi-trash"></span></button>
                                                </form></td>
                                        </tr>
                                    @else
                                        <tr bgcolor="#87cefa">
                                            <th scope="row">{{ $call->created_at }}</th>
                                            @empty($call->user_id)
                                                <td>No te empleat</td>
                                            @else
                                                <td>{{ $call->user->name }}</td>
                                            @endempty
                                            <td>{{ $call->client->name }}</td>
                                            <td>{{ $call->callinf }}</td>
                                            <td>{{ $call->user_id2 }}</td>
                                            <td><a href="{{ route('calls.show', ['call' => $call]) }}"><span class="oi oi-eye"></span></a></td>
                                            <td><a href="{{ route('calls.edit', ['call' => $call]) }}"><span class="oi oi-pencil"></span></a></td>

                                            <td><form action="{{ route('calls.destroy', $call) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-link" type="submit"><span class="oi oi-trash"></span></button>
                                                </form></td>
                                        </tr>
                                    @endif
                                @endif
                            @else
                                @if (auth()->id() === $call->user_id)
                                    @if ($call->stat->id === 1)

                                        <tr bgcolor="#f0e68c">
                                            <th scope="row">{{ $call->created_at }}</th>
                                            @empty($call->user_id)
                                                <td>No te empleat</td>
                                            @else
                                                <td>{{ $call->user->name }}</td>
                                            @endempty
                                            <td>{{ $call->client->name }}</td>
                                            <td>{{ $call->callinf }}</td>
                                            <td>{{ $call->user_id2 }}</td>
                                            <td><a href="{{ route('calls.show', ['call' => $call]) }}"><span class="oi oi-eye"></span></a></td>
                                            <td><a href="{{ route('calls.edit', ['call' => $call]) }}"><span class="oi oi-pencil"></span></a></td>

                                            <td><form action="{{ route('calls.destroy', $call) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-link" type="submit"><span class="oi oi-trash"></span></button>
                                                </form></td>
                                        </tr>
                                    @elseif ($call->stat->id === 2)
                                        <tr bgcolor="#fa8072">
                                            <th scope="row">{{ $call->created_at }}</th>
                                            @empty($call->user_id)
                                                <td>No te empleat</td>
                                            @else
                                                <td>{{ $call->user->name }}</td>
                                            @endempty
                                            <td>{{ $call->client->name }}</td>
                                            <td>{{ $call->callinf }}</td>
                                            <td>{{ $call->user_id2 }}</td>
                                            <td><a href="{{ route('calls.show', ['call' => $call]) }}"><span class="oi oi-eye"></span></a></td>
                                            <td><a href="{{ route('calls.edit', ['call' => $call]) }}"><span class="oi oi-pencil"></span></a></td>

                                            <td><form action="{{ route('calls.destroy', $call) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-link" type="submit"><span class="oi oi-trash"></span></button>
                                                </form></td>
                                        </tr>
                                    @else
                                        <tr bgcolor="#87cefa">
                                            <th scope="row">{{ $call->created_at }}</th>
                                            @empty($call->user_id)
                                                <td>No te empleat</td>
                                            @else
                                                <td>{{ $call->user->name }}</td>
                                            @endempty
                                            <td>{{ $call->client->name }}</td>
                                            <td>{{ $call->callinf }}</td>
                                            <td>{{ $call->user_id2 }}</td>
                                            <td><a href="{{ route('calls.show', ['call' => $call]) }}"><span class="oi oi-eye"></span></a></td>
                                            <td><a href="{{ route('calls.edit', ['call' => $call]) }}"><span class="oi oi-pencil"></span></a></td>

                                            <td><form action="{{ route('calls.destroy', $call) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-link" type="submit"><span class="oi oi-trash"></span></button>
                                                </form></td>
                                        </tr>
                                    @endif
                                @endif
                            @endif
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
