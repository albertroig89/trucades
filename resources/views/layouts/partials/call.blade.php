@if ($call->stat->id === 1)
    <tr bgcolor="#f0e68c">
        <th scope="row">{{ $call->created_at }}</th>
        <td>{{ $call->user->name }}</td>
        <td>{{ $call->client->name }}</td>
        <td>{{ $call->callinf }}</td>
        <td>{{ $call->user_id2 }}</td>
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
@elseif ($call->stat->id === 2)
    <tr bgcolor="#fa8072">
        <th scope="row">{{ $call->created_at }}</th>
        <td>{{ $call->user->name }}</td>
        <td>{{ $call->client->name }}</td>
        <td>{{ $call->callinf }}</td>
        <td>{{ $call->user_id2 }}</td>
        <td><a href="{{ route('calls.show', ['call' => $call]) }}"><span class="oi oi-eye"></span></a></td>
        <td><a href="{{ route('calls.edit', ['call' => $call]) }}"><span class="oi oi-pencil"></span></a></td>
        <td><form action="{{ route('calls.destroy', $call) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-link" type="submit"><span class="oi oi-trash"></span></button>
            </form></td>
    </tr>
@else
    <tr bgcolor="#87cefa">
        <th scope="row">{{ $call->created_at }}</th>
        <td>{{ $call->user->name }}</td>
        <td>{{ $call->client->name }}</td>
        <td>{{ $call->callinf }}</td>
        <td>{{ $call->user_id2 }}</td>
        <td><a href="{{ route('calls.show', ['call' => $call]) }}"><span class="oi oi-eye"></span></a></td>
        <td><a href="{{ route('calls.edit', ['call' => $call]) }}"><span class="oi oi-pencil"></span></a></td>
        <td><form action="{{ route('calls.destroy', $call) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-link" type="submit"><span class="oi oi-trash"></span></button>
            </form></td>
    </tr>
@endif