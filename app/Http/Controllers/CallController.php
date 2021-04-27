<?php

namespace App\Http\Controllers;

use App\Call;
use App\Client;
use App\Stat;
use App\User;
use App\Http\Requests\CreateCallRequest;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function index()
    {
        $calls = Call::all();
        $users = User::all();
        $nStat = Stat::where('title', 'Normal')->value('id');
        $uStat = Stat::where('title', 'Urgent')->value('id');
        $pStat = Stat::where('title', 'Pendent')->value('id');

        $title = 'Trucades';
        return view('calls.index', compact('title', 'calls', 'users', 'nStat', 'uStat', 'pStat'));
    }

    public function show(Call $call)
    {
        $title = 'Trucada';
        return view('calls.show', compact('title', 'call'));
    }

    public function create()
    {
        $title = 'Crear nova trucada';
        $clients = Client::all();
        $users = User::all();
        $stats = Stat::all();

        return view('calls.create', compact('title', 'clients', 'users', 'stats'));
    }

    public function edit(Call $call)
    {
        $clients = Client::all();
        $users = User::all();

        return view('calls.edit', ['call' => $call], compact( 'clients', 'users'));
    }
    public function store(CreateCallRequest $request)
    {
        $request->createCall();
        return redirect('/');
    }

    public function update(Call $call)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$call->id,
//            'password' => ''
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'Introduce un correo electronico',
            'email.email' => 'Introduce un correo electronico correcto',
            'email.unique' => 'El correo introducido ya existe',
        ]);

//        if ($data['password'] != null) {
//            $data['password'] = bcrypt($data['password']);
//        }else{
//            unset($data['password']);
//        }
        $call->update($data);

        return redirect()->route('calls.show', ['call' => $call]);
    }

    function destroy(Call $call)
    {
        $call->delete();
        return redirect()->route('home');
    }
}
