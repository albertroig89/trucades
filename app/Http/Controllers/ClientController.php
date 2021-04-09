<?php

namespace App\Http\Controllers;

use App\Client;
use App\Phone;
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
        return view('calls.create', compact('title', 'clients'));
    }

    function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }
}
