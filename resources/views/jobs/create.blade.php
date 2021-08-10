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
                        <select class='form-control select2' name='client_id' id='client_id'>
                            <option></option>
                            @foreach ($clients as $client)
                                <option value="{{ ($client->id) }}">{{ $client->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('clientname'))
                        <div class="form-group">
                            <input class="form-control is-invalid" name="clientname" id="clientname" value="{{ old('clientname') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('clientname') }}
                            </div>
                        </div>
                    @elseif ($errors->any())
                        <div class="form-group">
                            <input class="form-control is-valid" name="clientname" id="clientname" value="{{ old('clientname') }}">
                            <div class="valid-feedback">
                                Correcte!
                            </div>
                        </div>
                    @else
                    <div class="form-group">
                        <input class="form-control" name="clientname" id="clientname">
                    </div>
                    @endif

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
                        <label for="callinf">Informació de la feina:</label>
                        @if ($errors->has('job'))
                            <textarea name="job" class="form-control is-invalid" id="job">{{ old('job') }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('job') }}
                            </div>
                        @elseif ($errors->any())
                            <textarea name="job" class="form-control is-valid" id="job">{{ old('job') }}</textarea>
                            <div class="valid-feedback">
                                Correcte!
                            </div>
                        @else
                            <textarea name="job" class="form-control" id="job">{{ old('job') }}</textarea>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="user_id">Empleat:</label>
                        @if ($errors->has('user_id'))
                            <select class="form-control is-invalid" name="user_id" id="user_id">
                                <option value="{{ auth()->id() }}">{{ auth()->user()->name }}</option>
                                @foreach ($users as $user)
                                    @if (auth()->id() != $user->id))
                                        <option class="form-control is-invalid" value="{{ ($user->id) }}">{{ $user->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('user_id') }}
                            </div>
                        @elseif ($errors->any())
                            <select class="form-control is-valid" name="user_id" id="user_id">
                                <option value="{{ auth()->id() }}">{{ auth()->user()->name }}</option>
                                @foreach ($users as $user)
                                    @if (auth()->id() != $user->id))
                                        <option class="form-control is-valid" value="{{ ($user->id) }}">{{ $user->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="valid-feedback">
                                Correcte!
                            </div>
                        @else
                            <select class="form-control" name="user_id" id="user_id">
                                <option value="{{ auth()->id() }}">{{ auth()->user()->name }}</option>
                                @foreach ($users as $user)
                                    @if (auth()->id() != $user->id))
                                        <option class="form-control" value="{{ ($user->id) }}">{{ $user->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Afegir feina</button>
                <a href="{{ route('home') }}" class="btn btn-default float-right">Tornar a l'inici</a>
            </form>
        </div>
    </div>


@endsection
