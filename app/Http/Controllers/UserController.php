<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Department;
use App\User;

class UserController extends Controller
{
    public function index() {

        $users = User::all();

        $title = 'Usuaris';
//        dd($users);
        return view('users.index', compact('title', 'users'));

    }

    public function show(User $user)
    {
        $title = 'Detalles de Usuarios';

        return view('users.show', compact('title', 'user'));
    }

    public function create()
    {
        $title = 'Nou usuari';
        $departments = Department::all();
//        dd($departments);
        return view('users.create', compact('title', 'departments'));
    }

    public function edit(User $user)
    {
        $title = 'Edicion de usuarios';
        $departments = Department::all();
        return view('users.edit', ['user' => $user], compact('title', 'departments'));
    }

    public function store(CreateUserRequest $request)
    {
        $request->createUser();
        return redirect()->route('users.index');
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => ''
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'Introduce un correo electronico',
            'email.email' => 'Introduce un correo electronico correcto',
            'email.unique' => 'El correo introducido ya existe',
        ]);

        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        }else{
            unset($data['password']);
        }
        $user->update($data);

        return redirect()->route('users.index');
    }

    function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
