@extends('layout')

@section('title', "Editar client")

@section('content')

    <div class="card pl-0 pr-0 col-md-4 mt-2">
        <div class="card-header"><h3>{{ $client->name }}</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ url('clientes') }}">

                {!! csrf_field() !!}

                <div class="form-group">
                    <div class="form-group">
                        <label for="clientName">Nom client:</label>
                        @if ($errors->has('name'))
                            <input type="text" name="name" class="form-control is-invalid" id="name" aria-describedby="clientHelp" placeholder="Exemple S.L." value="{{ old('name', $client->name) }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('clientName') }}
                            </div>
                        @elseif ($errors->any())
                            <input type="text" name="name" class="form-control is-valid" id="name" aria-describedby="clientHelp" placeholder="Exemple S.L." value="{{ old('name', $client->name) }}">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                        @else
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="clientHelp" placeholder="Exemple S.L." value="{{ old('name', $client->name) }}">
                            <small id="nameHelp" class="form-text text-muted">Escriu el nom del client.</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="callinf">Correu electronic:</label>
                        @if ($errors->has('email'))
                            <input type="text" name="email" class="form-control is-invalid" id="email" aria-describedby="clientHelp" placeholder="example@example.com" value="{{ old('email', $client->email) }}">
                        @elseif ($errors->any())
                            <input type="text" name="email" class="form-control is-invalid" id="email" aria-describedby="clientHelp" placeholder="example@example.com" value="{{ old('email', $client->email) }}">
                            <div class="valid-feedback">
                                Correcte!
                            </div>
                        @else
                            <input type="text" name="email" class="form-control" id="email" aria-describedby="clientHelp" placeholder="example@example.com" value="{{ old('email', $client->email) }}">
                            <small id="emailHelp" class="form-text text-muted">Escriu el correu del client.</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefon:</label>
                        @if ($errors->has('phone'))
                            <input type="text" name="phone" class="form-control is-invalid" id="phone" aria-describedby="clientHelp" placeholder="example@example.com" value="{{ old('phone', $client->phone) }}">
                        @elseif ($errors->any())
                            <input type="text" name="phone" class="form-control is-invalid" id="phone" aria-describedby="clientHelp" placeholder="example@example.com" value="{{ old('phone', $client->phone) }}">
                            <div class="valid-feedback">
                                Correcte!
                            </div>
                        @else
                            @foreach ($phones as $phone)
                                @if ($phone->client_id == old('name', $client->id))
                                    <input type="text" name="phone" class="form-control" id="phone" aria-describedby="clientHelp" placeholder="977 70 70 70" value="{{ $phone->phone }}">
                                    <small id="phoneHelp" class="form-text text-muted">Escriu el telefon del client.</small>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Afegir client</button>
                <a href="{{ route('clients.index') }}" class="btn btn-default float-right">Tornar als clients</a>
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
