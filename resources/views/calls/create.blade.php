@extends('layout')

@section('title', "Nova trucada")

@section('content')

    <div class="card pl-0 pr-0 col-md-4 mt-2">
        <div class="card-header"><h3>{{ $title }}</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ url('usuarios') }}">

                {!! csrf_field() !!}

                <div class="form-group">
                    <div class="form-group">
                        <label for="id">Empleat:</label>
                        <select class="form-control" name="id" id="id">
                            <option value="">Sel·lecciona el teu departament</option>
                            @foreach ($users as $user)
                                <option class="form-control" value="{{ ($user->id) }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                    </div>

                    <div class="form-group">
                        <label for="callinf">Informació trucada:</label>
                        @if ($errors->has('callinf'))
                            <textarea name="callinf" class="form-control is-invalid" id="callinf">{{ old('callinf') }}</textarea>
                        @elseif ($errors->any())
                            <textarea name="callinf" class="form-control is-valid" id="callinf">{{ old('callinf') }}</textarea>
                            <div class="valid-feedback">
                                Correcte!
                            </div>
                        @else
                            <textarea name="callinf" class="form-control" id="callinf">{{ old('callinf') }}</textarea>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="id">Ates per:</label>
                        <select class="form-control" name="id" id="id">
                            <option value="">Sel·lecciona el teu departament</option>
                            @foreach ($users as $user)
                                <option class="form-control" value="{{ ($user->id) }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Afegir trucada</button>
            </form>
            <br>
            <p><a href="{{ route('home') }}">Tornar a les trucades</a></p>

            @if ($errors->any())
                <br>
                <div class="form-group">
                    <div class="alert alert-danger">
                        <h5>Por favor corrige los errores mencionados arriba {{ $errors }}</h5>
                    </div>
                </div>
            @endif
        </div>
    </div>


@endsection
