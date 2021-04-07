<?php

namespace App\Http\Controllers;

use App\Call;
use App\Client;
use App\User;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function index()
    {
        $calls = Call::all();
        $users = User::all();

        $title = 'Trucades';
        return view('calls.index', compact('title', 'calls', 'users'));
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

        return view('calls.create', compact('title', 'clients', 'users'));
    }

    public function edit(Call $call)
    {
        $title = 'Modificar trucada';
        $clients = Client::all();
        return view('calls.edit', ['call' => $call], compact('title', 'clients'));
    }
    public function store(CreateCallRequest $request)
    {
        $request->createCall();
        return redirect('home');
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
