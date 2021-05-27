@extends('layout')

@section('title', "Editar feina")

@section('content')

    <div class="card pl-0 pr-0 col-md-4 mt-2">
        <div class="card-header"><h3>{{ $job->client->name }}</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ url("trabajos/{$job->id}") }}">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}

                <div class="form-group">
                    <div class="form-group">
                        <label for="selector-clients">Client:</label>
                        <select class='form-control selector-clients' name='client_id' id='client_id'>
                            <option value="{{ old('id', $job->client_id) }}">{{ old('name', $job->client->name) }}</option>
                            @foreach ($clients as $client)
                                @if (old('id', $job->client_id) != $client->id)
                                    <option value="{{ ($client->id) }}">{{ $client->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inittime">Inici trucada:</label>
                        @if ($errors->has('inittime'))
                            <input type="text" class="form-control is-invalid" name="inittime" value="{{ old('inittime', \Carbon\Carbon::parse($job->inittime)->format('d-m-y H:i')) }}" id="inittime2"/>
                            <div class="invalid-feedback">
                                {{ $errors->first('inittime') }}
                            </div>
                        @elseif ($errors->any())
                            <input type="text" class="form-control is-valid" name="inittime" value="{{ old('inittime', \Carbon\Carbon::parse($job->inittime)->format('d-m-y H:i')) }}" id="inittime2"/>
                            <div class="valid-feedback">
                                Correcte!
                            </div>
                        @else
                            <input type="text" class="form-control" name="inittime" value="{{ old('inittime', \Carbon\Carbon::parse($job->inittime)->format('d-m-y H:i')) }}" id="inittime2"/>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="endtime">Final trucada:</label>
                        @if ($errors->has('endtime'))
                            <input type="text" class="form-control is-invalid" name="endtime" value="{{ old('endtime', \Carbon\Carbon::parse($job->endtime)->format('d-m-y H:i')) }}" id="endtime2"/>
                            <div class="invalid-feedback">
                                {{ $errors->first('endtime') }}
                            </div>
                        @elseif ($errors->any())
                            <input type="text" class="form-control is-valid" name="endtime" value="{{ old('endtime', \Carbon\Carbon::parse($job->endtime)->format('d-m-y H:i')) }}" id="endtime2"/>
                            <div class="valid-feedback">
                                Correcte!
                            </div>
                        @else
                            <input type="text" class="form-control" name="endtime" value="{{ old('endtime', \Carbon\Carbon::parse($job->endtime)->format('d-m-y H:i')) }}" id="endtime2"/>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="job">Informació trucada:</label>
                        @if ($errors->has('job'))
                            <textarea name="job" class="form-control is-invalid" id="job">{{ old('job', $job->job) }}</textarea>
                        @elseif ($errors->any())
                            <textarea name="job" class="form-control is-valid" id="job">{{ old('job', $job->job) }}</textarea>
                            <div class="valid-feedback">
                                Correcte!
                            </div>
                        @else
                            <textarea name="job" class="form-control" id="job">{{ old('job', $job->job) }}</textarea>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="user_id">Empleat:</label>
                        <select class="form-control" name="user_id" id="user_id">
                            <option value="{{ old('id', $job->user_id) }}">{{ old('name', $job->user->name) }}</option>
                            @foreach ($users as $user)
                                @if (old('id', $job->user_id) != $user->id)
                                    <option class="form-control" value="{{ ($user->id) }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Editar feina</button>
                <a href="{{ route('jobs.index') }}" class="btn btn-default float-right">Tornar a les feines</a>
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
