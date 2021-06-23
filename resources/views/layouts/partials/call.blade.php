@if ($call->stat->id === $nStat)
    <tr class="normalState">
        <th scope="row">{{ \Carbon\Carbon::parse($call->created_at)->format('d-m-y H:i') }}</th>
        <td>{{ $call->user->name }}</td>
        <td>{{ $call->clientname }}</td>
        <td class="nota">{{ $call->callinf }}</td>
        @if (!empty($call->clientphone))
            <td>{{ $call->clientphone }}</td>
        @else
            <td>
                @if (!empty($call->client))
                    @foreach ($phones as $phone)

                            @if ($phone->client_id === $call->client->id)
                                {{ $phone->phone }}
                            @endif
                    @endforeach
                @else
                    No hi ha telefon
                @endif
            </td>
        @endif
        @foreach ($users as $user)
            @if ($user->id === $call->user_id2)
                <td>{{ $user->name }}</td>
            @endif
        @endforeach
        <td><a href="{{ route('calls.jobfromcall', ['call' => $call]) }}"><span class="oi oi-plus"></span></a></td>
        <td><a href="{{ route('calls.edit', ['call' => $call]) }}"><span class="oi oi-pencil"></span></a></td>
        <td>
            <form action="{{ route('calls.destroy', $call) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-link" onclick="return confirm('Segur que vols eliminar la trucada?')" type="submit"><span class="oi oi-trash mt-0"></span></button>
            </form>
        </td>
    </tr>
@elseif ($call->stat->id === $uStat)
    <tr class="urgentState">
        <th scope="row">{{ \Carbon\Carbon::parse($call->created_at)->format('d-m-y H:i') }}</th>
        <td>{{ $call->user->name }}</td>
        <td>{{ $call->client->name }}</td>
        <td>{{ $call->callinf }}</td>
        <td>
            @foreach ($phones as $phone)
                @if ($phone->client_id === $call->client->id)
                    {{ $phone->phone }}
                @endif
            @endforeach
        </td>
        @foreach ($users as $user)
            @if ($user->id === $call->user_id2)
                <td>{{ $user->name }}</td>
            @endif
        @endforeach
        <td><a href="{{ route('calls.jobfromcall', ['call' => $call]) }}"><span class="oi oi-plus"></span></a></td>
        <td><a href="{{ route('calls.edit', ['call' => $call]) }}"><span class="oi oi-pencil"></span></a></td>

        <td>

            <form action="{{ route('calls.destroy', $call) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-link" onclick="return confirm('Segur que vols eliminar la trucada?')" type="submit"><span class="oi oi-trash mt-0"></span></button>
            </form>
        </td>
    </tr>
@elseif ($call->stat->id === $pStat)
    <tr class="pendingState">
        <th scope="row">{{ \Carbon\Carbon::parse($call->created_at)->format('d-m-y H:i') }}</th>
        <td>{{ $call->user->name }}</td>
        <td>{{ $call->client->name }}</td>
        <td>{{ $call->callinf }}</td>
        <td>
            @foreach ($phones as $phone)
                @if ($phone->client_id === $call->client->id)
                    {{ $phone->phone }}
                @endif
            @endforeach
        </td>
        @foreach ($users as $user)
            @if ($user->id === $call->user_id2)
                <td>{{ $user->name }}</td>
            @endif
        @endforeach
        <td><a href="{{ route('calls.jobfromcall', ['call' => $call]) }}"><span class="oi oi-plus"></span></a></td>
        <td><a href="{{ route('calls.edit', ['call' => $call]) }}"><span class="oi oi-pencil"></span></a></td>
        <td>
            <form action="{{ route('calls.destroy', $call) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-link" onclick="return confirm('Segur que vols eliminar la trucada?')" type="submit"><span class="oi oi-trash mt-0"></span></button>
            </form>
        </td>
    </tr>
@endif
