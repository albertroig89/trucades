<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\CreateClientRequest;
use App\Phone;
use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $phones = Phone::all();
        $title = 'Clients';
        return view('clients.index', compact('title', 'clients', 'phones'));
    }

    public function create()
    {
        $title = 'Nou client';
        $clients = Client::all();
        return view('clients.create', compact('title', 'clients'));
    }

    public function edit(Client $client)
    {
        $clients = Client::all();
        $users = User::all();
        $phones = Phone::all();

        return view('clients.edit', ['client' => $client], compact( 'clients', 'users', 'phones'));
    }
    public function store(CreateClientRequest $request)
    {
        $request->createClient();
        return redirect()->route('clients.index');
    }

    public function update(Client $client)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email'.$client->id,
            'phone' => 'required',
            'phones' => '',
        ], [
            'name.required' => 'Introdueix un nom per al client',
            'email.required' => 'Introdueix un correu electronic',
            'email.email' => 'Introdueix un correu electronic correcte',
            'email.unique' => 'El correu introduit ja exiteix',
            'phone.required' => 'Introdueix un telefon'
        ]);

        $client->update($data);

        $client->phone()->update([
            'phone' => $data['phone'],
        ]);

        $phones = $data['phones'];

        foreach($phones as $phone){
            $client->phone()->update([
                'phone' => $phone,
            ]);
        }

        return redirect()->route('clients.index', ['client' => $client]);
    }

    function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }
}
