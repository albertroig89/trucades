@extends('layout')

@section('title', "Edicion de usuarios")

@section('content')

    <div class="card pl-0 pr-0 col-md-4 mt-2">
        <div class="card-header"><h3>{{ $call->client->name }}</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ url("llamadas/{$call->id}") }}">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}

                <div class="form-group">
                    <div class="form-group">
                        <label for="user_id">Empleat:</label>
                        <select class="form-control" name="user_id" id="user_id">
                            <option value="{{ old('id', $call->user_id) }}">{{ old('name', $call->user->name) }}</option>
                            @foreach ($users as $user)
                                <option class="form-control" value="{{ ($user->id) }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                    </div>

                    <div class="form-group">
                        <label for="callinf">Informació trucada:</label>
                        @if ($errors->has('callinf'))
                            <textarea name="callinf" class="form-control is-invalid" id="callinf">{{ old('callinf', $call->callinf) }}</textarea>
                        @elseif ($errors->any())
                            <textarea name="callinf" class="form-control is-valid" id="callinf">{{ old('callinf', $call->callinf) }}</textarea>
                            <div class="valid-feedback">
                                Correcte!
                            </div>
                        @else
                            <textarea name="callinf" class="form-control" id="callinf">{{ old('callinf', $call->callinf) }}</textarea>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="id">Ates per:</label>
                        <select class="form-control" name="id" id="id">
                            @foreach ($users as $user)
                                @if ($user->id === old('id2', $call->user_id2))
                                    <option class="form-control" value="{{ old('id2', $call->user_id2) }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                            @foreach ($users as $user)
                                <option class="form-control" value="{{ ($user->id) }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Editar trucada</button>
                <a href="{{ route('home') }}" class="btn btn-default float-right">Tornar a les trucades</a>
            </form>

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
