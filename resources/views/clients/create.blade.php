@extends('layout')

@section('title', "Nou client")

@section('content')

    <div class="card pl-0 pr-0 col-md-4 mt-2">
        <div class="card-header"><h3>{{ $title }}</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ url('clientes') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <div class="form-group">
                        <label for="clientName">Nom client:</label>
                        @if ($errors->has('name'))
                            <input type="text" name="name" class="form-control is-invalid" id="name" aria-describedby="clientHelp" placeholder="Exemple S.L." value="{{ old('name') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('clientName') }}
                            </div>
                        @elseif ($errors->any())
                            <input type="text" name="name" class="form-control is-valid" id="name" aria-describedby="clientHelp" placeholder="Exemple S.L." value="{{ old('name') }}">
                            <div class="valid-feedback">
                                Correcte!
                            </div>
                        @else
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="clientHelp" placeholder="Exemple S.L." value="{{ old('name') }}">
                            <small id="nameHelp" class="form-text text-muted">Escriu el nom del client.</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="callinf">Correu electronic:</label>
                        @if ($errors->has('email'))
                            <input type="text" name="email" class="form-control is-invalid" id="email" aria-describedby="clientHelp" placeholder="example@example.com" value="{{ old('email') }}">
                        @elseif ($errors->any())
                            <input type="text" name="email" class="form-control is-valid" id="email" aria-describedby="clientHelp" placeholder="example@example.com" value="{{ old('email') }}">
                            <div class="valid-feedback">
                                Correcte!
                            </div>
                        @else
                            <input type="text" name="email" class="form-control" id="email" aria-describedby="clientHelp" placeholder="example@example.com" value="{{ old('email') }}">
                            <small id="emailHelp" class="form-text text-muted">Escriu el correu del client.</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone1">Telèfon:</label>
                        @if ($errors->has('phone'))
                            <input type="text" name="phone" class="form-control is-invalid" id="phone" aria-describedby="clientHelp" placeholder="example@example.com" value="{{ old('phone') }}">
                            <div class="button">
                                <button type="button" id="add_phone" class="btn btn-default">Afegir telèfon</button>
                            </div>
                        @elseif ($errors->any())
                            <input type="text" name="phone" class="form-control is-valid" id="phone" aria-describedby="clientHelp" placeholder="example@example.com" value="{{ old('phone') }}">
                            <div class="button">
                                <button type="button" id="add_phone" class="btn btn-default">Afegir telèfon</button>
                            </div>
                            <div class="valid-feedback">
                                Correcte!
                            </div>
                        @else
                            <div><input type="text" name="phone" class="form-control" id="phone" aria-describedby="clientHelp" placeholder="977 70 70 70" value="{{ old('phone') }}">
                            <small id="phoneHelp" class="form-text text-muted">Escriu el telefon del client.</small></div>
                            <div class="button">
                                <button type="button" id="add_phone" class="btn btn-default">Afegir telèfon</button>
                            </div>
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
