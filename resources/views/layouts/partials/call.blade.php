@if ($call->stat->id === $nStat)
    <tr class="normalState">
        <th scope="row">{{ $call->created_at }}</th>
        <td>{{ $call->user->name }}</td>
        <td>{{ $call->client->name }}</td>
        <td class="nota">{{ $call->callinf }}</td>
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
        <td><a class="btn btn-link" href="{{ route('calls.show', ['call' => $call]) }}"><span class="oi oi-plus"></span></a></td>
        <td><a class="btn btn-link" href="{{ route('calls.edit', ['call' => $call]) }}"><span class="oi oi-pencil"></span></a></td>
        <td>
            <form action="{{ route('calls.destroy', $call) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-link" type="submit"><span class="oi oi-trash"></span></button>
            </form>
        </td>
    </tr>
@elseif ($call->stat->id === $uStat)
    <tr class="urgentState">
        <th scope="row">{{ $call->created_at }}</th>
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
        <td><a class="btn btn-link" href="{{ route('calls.show', ['call' => $call]) }}"><span class="oi oi-plus"></span></a></td>
        <td><a class="btn btn-link" href="{{ route('calls.edit', ['call' => $call]) }}"><span class="oi oi-pencil"></span></a></td>
        <td><form action="{{ route('calls.destroy', $call) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-link" type="submit"><span class="oi oi-trash"></span></button>
            </form></td>
    </tr>
@elseif ($call->stat->id === $pStat)
    <tr class="pendingState">
        <th scope="row">{{ $call->created_at }}</th>
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
        <td><a class="btn btn-link" href="{{ route('calls.show', ['call' => $call]) }}"><span class="oi oi-plus"></span></a></td>
        <td><a class="btn btn-link" href="{{ route('calls.edit', ['call' => $call]) }}"><span class="oi oi-pencil"></span></a></td>
        <td><form action="{{ route('calls.destroy', $call) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-link" type="submit"><span class="oi oi-trash"></span></button>
            </form></td>
    </tr>
@endif