@extends('layout')

@section('title', "Edicion de usuarios")

@section('content')

    <div class="card pl-0 pr-0 col-md-4 mt-2">
        <div class="card-header"><h3>{{ $title }}</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ url("usuarios/{$user->id}") }}">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}

                <div class="form-group">
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        @if ($errors->has('name'))
                            <input type="text" name="name" class="form-control is-invalid" id="name" aria-describedby="nameHelp" placeholder="Bertito tito" value="{{ old('name', $user->name) }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @elseif ($errors->any())
                            <input type="text" name="name" class="form-control is-valid" id="name" aria-describedby="nameHelp" placeholder="Bertito tito" value="{{ old('name', $user->name) }}">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                        @else
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Bertito tito" value="{{ old('name', $user->name) }}">
                            <small id="nameHelp" class="form-text text-muted">Escriu el teu nom.</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email">Correu electronic:</label>
                        @if ($errors->has('email'))
                            <input type="email" name="email" class="form-control is-invalid" id="email" aria-describedby="emailHelp" placeholder="bertito@example.es" value="{{ old('email', $user->email) }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @elseif ($errors->any())
                            <input type="email" name="email" class="form-control is-valid" id="email" aria-describedby="emailHelp" placeholder="bertito@example.es" value="{{ old('email', $user->email) }}">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                        @else
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="bertito@example.es" value="{{ old('email', $user->email) }}">
                            <small id="emailHelp" class="form-text text-muted">Escriu el teu correu.</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="department_id">Departament:</label>
                        <select class="form-control" name="department_id" id="department_id">
                            <option value="">Sel·lecciona el teu departament</option>
                            @foreach ($departments as $department)
                                <option class="form-control" value="{{ ($department->id) }}">{{ $department->title }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                    </div>
                    <div class="form-group">
                        @if ($errors->has('password'))
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control is-invalid" id="password" placeholder="Introdueix la contrasenya">
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @else
                            <label for="password">Contrasenya:</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Introdueix la contrasenya">
                            <small id="emailHelp" class="form-text text-muted">Minim 6 caracters.</small>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Editar usuari</button>
                <a href="{{ route('users.index') }}" class="btn btn-default float-right">Tornar al llistat d'usuaris</a>
            </form>

            @if ($errors->any())
                <br>
                <div class="form-group">
                    <div class="alert alert-danger">
                        <h5>Por favor corrige los errores mencionados arriba</h5>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection