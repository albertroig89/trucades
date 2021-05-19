@extends('layout')

@section('title', "Feines")

@section('content')

    <div class="card pl-0 pr-0 col-md-12 mt-2" >
        <div class="card-header"><h3>{{ $title }}</h3></div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <ul>
                @if ($jobs->count())
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
{{--                            <th scope="col">Ates per</th>--}}
{{--                            <th scope="col">Visualitzar detalls feina</th>--}}
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($jobs as $job)
                            <tr>
                                <th scope="row">{{ \Carbon\Carbon::parse($job->created_at)->format('d-m-y H:m') }}</th>
                                <td>{{ $job->user->name }}</td>
                                <td>{{ $job->client->name }}</td>
                                <td>{{ $job->job }}</td>
                                <td>{{ \Carbon\Carbon::parse($job->inittime)->format('d-m-y H:m') }}</td>
                                <td>{{ \Carbon\Carbon::parse($job->endtime)->format('d-m-y H:m') }}</td>
                                <td>{{ $job->totalmin }} min</td>
                                <td><a href="{{ route('users.edit', ['id' => $job->id]) }}"><span class="oi oi-pencil"></span></a></td>

                                <td><form action="{{ route('users.destroy', $job) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-link" type="submit"><span class="oi oi-trash"></span></button>
                                    </form></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <li>No hi ha feines pendents</li>
                @endif
            </ul>
        </div>
    </div>
@endsection
