@extends('layout')

@section('title', "{$call->client->name}")

@section('content')

    <div class="card pl-0 pr-0 col-md-4 mt-2">
        <div class="card-header"><h3>Feina {{ $call->client->name }}</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ url("trabajos/{$call->id}") }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <div class="form-group">
                        <label for="selector-clients">Client:</label>
                        <select class='form-control selector-clients' name='client_id' id='client_id'>
                            <option value="{{ $call->client->id }}">{{ $call->client->name }}</option>
                            @foreach ($clients as $client)
                                <option value="{{ ($client->id) }}">{{ $client->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inittime">Inici trucada:</label>
                        @if ($errors->has('inittime'))
                            <input type="text" class="form-control is-invalid" name="inittime" value="{{ old('inittime') }}" id="inittime"/>
                            <div class="invalid-feedback">
                                {{ $errors->first('inittime') }}
                            </div>
                        @elseif ($errors->any())
                            <input type="text" class="form-control is-valid" name="inittime" value="{{ old('inittime') }}" id="inittime"/>
                            <div class="valid-feedback">
                                Correcte!
                            </div>
                        @else
                            <input type="text" class="form-control" name="inittime" value="{{ old('inittime') }}" id="inittime"/>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="endtime">Final trucada:</label>
                        @if ($errors->has('endtime'))
                            <input type="text" class="form-control is-invalid" name="endtime" value="{{ old('endtime') }}" id="endtime"/>
                            <div class="invalid-feedback">
                                {{ $errors->first('endtime') }}
                            </div>
                        @elseif ($errors->any())
                            <input type="text" class="form-control is-valid" name="endtime" value="{{ old('endtime') }}" id="endtime"/>
                            <div class="valid-feedback">
                                Correcte!
                            </div>
                        @else
                            <input type="text" class="form-control" name="endtime" value="{{ old('endtime') }}" id="endtime"/>
                        @endif
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
                            <option value="{{ auth()->id() }}">{{ auth()->user()->name }}</option>
                            @foreach ($users as $user)
                                @if (auth()->id() != $user->id)
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
                <button type="submit" class="btn btn-primary">Afegir feina</button>
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

