@extends('layout')

@section('title', "Usuarios")

@section('content')

    <div class="card pl-0 pr-0 col-md-12" >
        <div class="card-header"><h3>{{ $title }}</h3></div>
        <div class="card-body">
            <ul>
                @if ($users->count())
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
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                @empty($user->department_id)
                                    <td>Sense departament</td>
                                @else
                                    {{--                              <td>{{ $user->department->title }}</td>--}}
                                    {{--                                  {{ dd($user->department->title) }}--}}
                                    <td>{{ $user->department }}</td>
                                @endempty
                                {{--                            <td>{{ $user->profession()->pluck('title') }}</td>--}}
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
                    <li>No hay usuarios registrados.</li>
                @endif
            </ul>
        </div>
    </div>
@endsection