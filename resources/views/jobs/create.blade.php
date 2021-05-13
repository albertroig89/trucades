@extends('layout')

@section('title', "Afegir feina")

@section('content')

    <div class="card pl-0 pr-0 col-md-4 mt-2">
        <div class="card-header"><h3>{{ $title }}</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ url('/trabajos') }}">

                {!! csrf_field() !!}

                <div class="form-group">
                    <div class="form-group">
                        <label for="selector-clients">Client:</label>
                        <select class='form-control selector-clients' name='client_id' id='client_id'>
                            <option value="">Selecciona un client</option>
                            @foreach ($clients as $client)
                                <option value="{{ ($client->id) }}">{{ $client->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="datetimepicker_mask">Inici trucada:</label>
                        <input type="text" class="form-control" value="" id="datetimepicker_mask"/>
                    </div>
                    <div class="form-group">
                        <label for="datetimepicker_mask2">Final trucada:</label>
                        <input type="text" class="form-control" value="" id="datetimepicker_mask2"/>
                    </div>
                    <div class="form-group">
                        <label for="callinf">Informació de la feina:</label>
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
                        <label for="user_id">Empleat:</label>
                        <select class="form-control" name="user_id" id="user_id">
                            <option value="">Sel·lecciona empleat</option>
                            @foreach ($users as $user)
                                <option class="form-control" value="{{ ($user->id) }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Afegir feina</button>
                <a href="{{ route('home') }}" class="btn btn-default float-right">Tornar a l'inici</a>
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
