<?php

namespace App\Http\Controllers;

use App\Call;
use App\Client;
use App\Phone;
use App\Stat;
use App\User;
use App\Http\Requests\CreateCallRequest;


class CallController extends Controller
{
    public function index()
    {
        $calls = Call::all();
        $users = User::all();
        $phones = Phone::all();
        $nStat = Stat::where('title', 'Normal')->value('id');
        $uStat = Stat::where('title', 'Urgent')->value('id');
        $pStat = Stat::where('title', 'Pendent')->value('id');

        $title = 'Trucades';
        return view('calls.index', compact('title', 'calls', 'users', 'phones', 'nStat', 'uStat', 'pStat'));
    }

    public function show(Call $call)
    {
        $title = 'Trucada';
        return view('calls.show', compact('title', 'call'));
    }

    public function create()
    {
        $title = 'Nova trucada';
        $clients = Client::all();
        $users = User::all();
        $stats = Stat::all();

        return view('calls.create', compact('title', 'clients', 'users', 'stats'));
    }

    public function jobfromcall(Call $call)
    {
        $clients = Client::all();
        $users = User::all();
        $stats = Stat::all();

        return view('calls.jobfromcall', compact( 'call', 'clients', 'users', 'stats'));
    }

    public function edit(Call $call)
    {
        $clients = Client::all();
        $users = User::all();
        $stats = Stat::all();

        return view('calls.edit', ['call' => $call], compact( 'clients', 'users', 'stats'));
    }
    public function store(CreateCallRequest $request)
    {
        $request->createCall();
        return redirect()->route('home');
    }

    public function update(Call $call)
    {
        $data = request()->validate([
            'user_id' => 'required',
            'client_id' => '',
            'user_id2' => 'required',
            'stat_id' => 'required',
            'callinf' => 'required',
            'clientname' => 'required',
            'clientphone' => '',
        ], [
            'user_id.required' => 'Selecciona un empleat',
            'clientname.required' => 'Selecciona un client o escriu-ne un',
            'user_id2.required' => 'Selecciona un empleat',
            'stat_id' => 'required',
            'callinf.required' => 'Omple l\'informació de la trucada'
        ]);

        $call->update($data);

        return redirect()->route('home');
    }

//    function destroy($id)
//    {
//        Call::query()->findOrFail($id)->delete();
//        return redirect()->route('home');
//    }

    function destroy(Call $call)
    {
        $call->delete();
        return redirect()->route('home');
    }
}
