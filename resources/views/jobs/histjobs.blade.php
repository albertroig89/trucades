@extends('layout')

@section('title', "Historic de feines")

@section('content')

    <div class="card pl-0 pr-0 col-md-12 mt-2" >
        <div class="card-header"><h3>{{ $title }}</h3><a class="btn btn-default float-right" onclick="return confirm('Segur que vols eliminar tots els registres del historic')">Elimina tots el registres</a></div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <ul>
                @if ($histjobs->count())
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Empleat</th>
                            <th scope="col">Client</th>
                            <th scope="col" class="nota">Nota</th>
                            <th scope="col">Inici feina</th>
                            <th scope="col">Final feina</th>
                            <th scope="col">Temps empleat</th>
{{--                            <th></th>--}}
{{--                            <th></th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($histjobs as $histjob)
                            <tr>
                                <th scope="row">{{ \Carbon\Carbon::parse($histjob->created_at)->format('d-m-y H:i') }}</th>
                                <td>{{ $histjob->username }}</td>
                                <td>{{ $histjob->clientname }}</td>
                                <td>{{ $histjob->job }}</td>
                                <td>{{ \Carbon\Carbon::parse($histjob->inittime)->format('d-m-y H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($histjob->endtime)->format('d-m-y H:i') }}</td>
                                <td>{{ $histjob->totalmin }} min</td>
{{--                                <td><a href="{{ route('jobs.edit', ['id' => $histjob->id]) }}"><span class="oi oi-pencil"></span></a></td>--}}

{{--                                <td><form action="{{ route('jobs.destroy', $histjob) }}" method="POST">--}}
{{--                                        {{ csrf_field() }}--}}
{{--                                        {{ method_field('DELETE') }}--}}
{{--                                        <button class="btn btn-link" onclick="return confirm('Segur que vols eliminar la feina?')" type="submit"><span class="oi oi-trash"></span></button>--}}
{{--                                </form></td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <li>No hi ha feines al historic</li>
                @endif
            </ul>
        </div>
    </div>
@endsection
