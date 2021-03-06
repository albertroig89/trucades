@extends('layout')

@section('title', "Clients")

@section('content')


    <div class="card pl-0 pr-0 col-md-12 mt-2" >
        <div class="card-header">
            <h3>
                {{ $title }}
                {!! Form::open(['route' => 'clients.index', 'method' => 'GET', 'class' => 'float-right', 'role' => 'search']) !!}
                    <div class="form-inline">
                        {!! Form::text('name', null, ['class' => 'form-control mr-2', 'placeholder' => 'Client']) !!}
                    <div>
                    <button type="submit" class="btn btn-default">Cerca</button>
                {!! Form::close() !!}
            </h3>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <ul>
                @if ($clients->count())
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Client</th>
                            <th scope="col">Telèfons</th>
                            <th scope="col">Correu electronic</th>
                            @if (auth()->user()->department->title === "Administracio" or auth()->user()->name === "Albert Roig")
                                <th scope="col">Editar client</th>
                                <th scope="col">Eliminar client</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($clients as $client)

                                <tr>
                                    <th scope="row">{{ $client->name }}</th>
                                    <td>
                                    @foreach ($phones as $phone)
                                        @if ($phone->client_id === $client->id)
                                            {{ $phone->phone }}
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>{{ $client->email }}</td>
                                    @if (auth()->user()->department->title === "Administracio" or auth()->user()->name === "Albert Roig")
                                        <td><a class="btn btn-link" href="{{ route('clients.edit', ['call' => $client]) }}"><span class="oi oi-pencil"></span></a></td>

                                        <td>
                                            <form action="{{ route('clients.destroy', $client) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-link" onclick="return confirm('Segur que vols eliminar el client?')" type="submit"><span class="oi oi-trash"></span></button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $clients->links() }}
                @else
                    <li>La cerca no ha retornat cap resultat</li>
                @endif
            </ul>
        </div>
    </div>
@endsection
