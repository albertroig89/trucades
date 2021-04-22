<style>
    /*estils diferents per a les files de les trucades*/
    /*.table-striped>tbody>tr:nth-child(odd)>td,*/
    /*.table-striped>tbody>tr:nth-child(odd)>th {*/
    /*    background-color: #91ffb5;*/
    /*}*/
    /*.table-striped>tbody>tr:nth-child(even)>td,*/
    /*.table-striped>tbody>tr:nth-child(even)>th {*/
    /*    background-color: #f66767;*/
    /*}*/
    /*.table-striped>thead>tr>th {*/
    /*    background-color: #62a3e7;*/
    /*}*/
    .normalState {
        background-color: #91ffb5;
    }
    .urgentState {
        background-color: #f66767;
    }
    .pendingState {
        background-color: #62a3e7;
    }
    /*final estils files trucades*/
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