@extends('layout')

@section('title', "Editar trucada")

@section('content')

    <div class="card pl-0 pr-0 col-md-4 mt-2">
        <div class="card-header"><h3>{{ $call->clientname }}</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ url("llamadas/{$call->id}") }}">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}

                <div class="form-group">
                    <div class="form-group">
                        <label for="selector-clients">Client:</label>
                        @if(empty($call->client))
                            <select class='form-control select2' name='client_id' id='client_id'>
                                <option></option>
                                @foreach ($clients as $client)
                                    <option value="{{ ($client->id) }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        @else
                            <select class='form-control selector-clients' name='client_id' id='client_id'>
                                <option value="{{ old('id', $call->client_id) }}">{{ old('name', $call->client->name) }}</option>
                                <option value="">Sense client BD</option>
                                @foreach ($clients as $client)
                                    @if (old('id', $call->client_id) != $client->id)
                                        <option value="{{ ($client->id) }}">{{ $client->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <div>
                        <input class="form-control" name="clientname" id="clientname" value="{{ old('call', $call->clientname) }}">
                    </div>
                    <div class="form-group">
                        <label for="clientphone">Telefon:</label>
                        <input class="form-control" name="clientphone" id="clientphone">
                    </div>
                    <div class="form-group">
                        <label for="id">Ates per:</label>
                        <select class="form-control" name="user_id2" id="user_id2">
                            @foreach ($users as $user)
                                @if ($user->id === old('id2', $call->user_id2))
                                    <option class="form-control" value="{{ old('id2', $call->user_id2) }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                            @foreach ($users as $user)
                                @if (old('id2', $call->user_id2) != $user->id)
                                    <option class="form-control" value="{{ ($user->id) }}">{{ $user->name }}</option>
                                @endif
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
                        <label for="user_id">Empleat:</label>
                        <select class="form-control" name="user_id" id="user_id">
                            <option value="{{ old('id', $call->user_id) }}">{{ old('name', $call->user->name) }}</option>
                            @foreach ($users as $user)
                                @if (old('id', $call->user_id) != $user->id)
                                    <option class="form-control" value="{{ ($user->id) }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                    </div>
                    <div class="form-group">
                        <label for="stat_id">Estat:</label>
                        <select class='form-control' name='stat_id' id='stat_id'>
                            @foreach ($stats as $stat)
                                <option value="{{ ($stat->id) }}">{{ $stat->title }}</option>
                            @endforeach
                        </select>
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
