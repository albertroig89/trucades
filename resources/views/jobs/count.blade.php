@extends('layout')

@section('title', "Contador")

@section('content')

    <div class="card pl-0 pr-0 col-md-12 mt-2" >
        <div class="card-header"><h3>{{ $title }}</h3></div>
        <div class="card-body">
            <ul>
                @if ($jobs->count())
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Temps total feines</th>
                            <th scope="col">Temps total historic</th>
                            <th scope="col">Temps total historic ocult</th>
                            <th scope="col">Total temps</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <?php $contador=0 ?>
                                    @foreach ($jobs as $job)
                                        @if ($user->id == $job->user_id)
                                            <?php $contador = $contador + $job->totalmin ?>
                                        @endif
                                    @endforeach
                                    {{$contador}} min
                                </td>
                                <td>
                                    <?php $contador=0 ?>
                                    @foreach ($histjobs as $histjob)
                                        @if ($user->name == $histjob->username)
                                            <?php $contador = $contador + $histjob->totalmin ?>
                                        @endif
                                    @endforeach
                                    {{$contador}} min
                                </td>
                                <td>
                                    <?php $contador=0 ?>
                                    @foreach ($histjobs2 as $histjob)
                                        @if ($user->name == $histjob->username)
                                            <?php $contador = $contador + $histjob->totalmin ?>
                                        @endif
                                    @endforeach
                                    {{$contador}} min
                                </td>
                                <th>
                                    <?php $contador=0 ?>
                                    @foreach ($jobs as $job)
                                        @if ($user->id == $job->user_id)
                                            <?php $contador = $contador + $job->totalmin ?>
                                        @endif
                                    @endforeach
                                    @foreach ($histjobs as $histjob)
                                        @if ($user->name == $histjob->username)
                                            <?php $contador = $contador + $histjob->totalmin ?>
                                        @endif
                                    @endforeach
                                    @foreach ($histjobs2 as $histjob2)
                                        @if ($user->name == $histjob2->username)
                                            <?php $contador = $contador + $histjob2->totalmin ?>
                                        @endif
                                    @endforeach
                                    {{$contador}} min
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <li>No hi ha feines.</li>
                @endif
            </ul>
        </div>
    </div>
@endsection