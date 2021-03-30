<?php

namespace App\Http\Controllers;

use App\Call;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calls = Call::all();
        $users = User::all();

        $title = 'Trucades';

//        return view ('home');
        return view('home', compact('title', 'calls', 'users'));
    }

    public function show(Call $call)
    {
        $title = 'Detalles de Usuarios';

        return view('calls.show', compact('title', 'call'));
    }

    public function create()
    {
        $title = 'Creacion de usuarios';
        $clients = Client::all();
//        dd($departments);
        return view('calls.create', compact('title', 'clients'));
    }

    public function edit(Call $call)
    {
        $title = 'Edicion de usuarios';
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
