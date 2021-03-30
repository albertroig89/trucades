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
                                <td>{{ $call->user->name }}</td>
                                <td>{{ $call->client->name }}</td>
                                <td>{{ $user->department }}</td>
                                <td><a href="{{ route('users.show', ['id' => $user->id]) }}"><span class="oi oi-eye"></span></a></td>
                                <td><a href="{{ route('users.edit', ['id' => $user->id]) }}"><span class="oi oi-pencil"></span></a></td>

                                <td><form action="{{ route('users.destroy', $user) }}" method="POST">
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