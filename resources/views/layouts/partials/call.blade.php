<style>
    .normalState {
        background-color: #daffe3;
        height: 50px;
    }
    .urgentState {
        background-color: #fab9b9;
    }
    .pendingState {
        background-color: #aed7ff;
    }
    /*final estils files trucades*/
    /*estils iconos*/
    .oi-eye{
        color: #686868;
    }

    .oi-eye:hover{
        color: #1c1c1c;
    }
    .oi-pencil{
        color: #686868;
    }
    .oi-pencil:hover{
        color: #1c1c1c;
    }
    .oi-trash{
        color: #686868;
    }
    .oi-trash:hover{
        color: #1c1c1c;
    }
    /*final estils iconos*/
    /**/
</style>
@if ($call->stat->id === $nStat)
    <tr class="normalState">
        <th scope="row">{{ $call->created_at }}</th>
        <td>{{ $call->user->name }}</td>
        <td>{{ $call->client->name }}</td>
        <td>{{ $call->callinf }}</td>
        @foreach ($users as $user)
            @if ($user->id === $call->user_id2)
                <td>{{ $user->name }}</td>
            @endif
        @endforeach
        <td><a href="{{ route('calls.show', ['call' => $call]) }}"><span class="oi oi-eye"></span></a></td>
        <td><a href="{{ route('calls.edit', ['call' => $call]) }}"><span class="oi oi-pencil"></span></a></td>
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
        @foreach ($users as $user)
            @if ($user->id === $call->user_id2)
                <td>{{ $user->name }}</td>
            @endif
        @endforeach
        <td><a href="{{ route('calls.show', ['call' => $call]) }}"><span class="oi oi-eye"></span></a></td>
        <td><a href="{{ route('calls.edit', ['call' => $call]) }}"><span class="oi oi-pencil"></span></a></td>
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
        @foreach ($users as $user)
            @if ($user->id === $call->user_id2)
                <td>{{ $user->name }}</td>
            @endif
        @endforeach
        <td><a href="{{ route('calls.show', ['call' => $call]) }}"><span class="oi oi-eye"></span></a></td>
        <td><a href="{{ route('calls.edit', ['call' => $call]) }}"><span class="oi oi-pencil"></span></a></td>
        <td><form action="{{ route('calls.destroy', $call) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-link" type="submit"><span class="oi oi-trash"></span></button>
            </form></td>
    </tr>
@endif