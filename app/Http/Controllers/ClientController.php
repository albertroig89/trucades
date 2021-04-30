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
        $title = 'Crear nou client';
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
        return redirect('clients.index');
    }

    function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }
}
