@extends('layout')

@section('title', "Usuaris")

@section('content')

<div class="card pl-0 pr-0 col-md-12 mt-2" >
    <div class="card-header"><h3>{{ $title }}</h3></div>
    <div class="card-body">
        <ul>
            @if ($users->count())
                <table class="table table-striped">
                        <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Nom</th>
                          <th scope="col">Email</th>
                          <th scope="col">Departament</th>
                          <th scope="col">Editar detalls d'usuari</th>
                          <th scope="col">Eliminar usuari</th>
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
                              <td>{{ $user->department->title }}</td>
                              @endempty
                              @if ($user->name === "Albert Roig")
                                  @if (auth()->user()->name === "Albert Roig")
                                      <td><a href="{{ route('users.edit', ['id' => $user->id]) }}"><span class="oi oi-pencil"></span></a></td>
                                  @else
                                      <td><a onclick="return alert('No pots editar el compte d\'administrador')" href=""><span class="oi oi-pencil"></span></a></td>
                                  @endif
                              @else
                                  <td><a href="{{ route('users.edit', ['id' => $user->id]) }}"><span class="oi oi-pencil"></span></a></td>
                              @endif



                              @if ($user->name === "Albert Roig")
                                  @if (auth()->user()->name === "Albert Roig")
                                      <td><form action="{{ route('users.destroy', $user) }}" method="POST">
                                              {{ csrf_field() }}
                                              {{ method_field('DELETE') }}
                                              <button class="btn btn-link" onclick="return confirm('Segur que vols eliminar l\'usuari?')" type="submit"><span class="oi oi-trash"></span></button>
                                      </form></td>
                                  @else
                                      <td>
                                          <button class="btn btn-link" onclick="return alert('No pots eliminar el compte d\'administrador')"><span class="oi oi-trash"></span></button>
                                      </td>
                                  @endif
                              @else
                                  <td><form action="{{ route('users.destroy', $user) }}" method="POST">
                                          {{ csrf_field() }}
                                          {{ method_field('DELETE') }}
                                          <button class="btn btn-link" onclick="return confirm('Segur que vols eliminar l\'usuari?')" type="submit"><span class="oi oi-trash"></span></button>
                                      </form></td>
                              @endif

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
