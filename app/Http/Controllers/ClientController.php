<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\CreateClientRequest;
use App\Phone;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::name($request->get('name'))->orderBy('name')->paginate(50);
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
            'phone' => 'required',
            'phones' => ''
        ], [
            'name.required' => 'Introdueix un nom per al client',
            'phone.required' => 'Introdueix un telèfon'
        ]);

        $client->update($data);

        $phones = Phone::all();
        $count = 0;
        foreach ($phones as $phone){
            if ($phone->client_id == $client->id){
                $count++;
            }
        }

        if (!empty($data['phones'])) {
            $client->phone()->update([
                'phone' => $data['phone'],
            ]);
            $phones = $data['phones'];
            foreach ($phones as $phone) {
                $client->phone()->update([
                    'phone' => $phone,
                ]);
//                dd($client->phone());
            }
        }elseif (empty($data['phones']) and $count == 1){
            $client->phone()->update([
                'phone' => $data['phone'],
            ]);
        }else{

        }

        return redirect()->route('clients.index', ['client' => $client]);
    }

    function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }


    public function showimport()
    {
        $title = 'Importar clients desde xlsx';
        return view('clients.import', compact('title'));
    }


    public function import()
    {
        Excel::load('clients.xlsx', function($reader) {

            foreach ($reader->get() as $cliente) {
                if (!empty($cliente->phone1) and
                    $cliente->name != "IES MONTSIA" and //TOTS ESTOS CLIENTS ESTAN DUPLICATS A LA BD I S'HAN D'INTRODUIR A MA
                    $cliente->name != "FERRE ANDREU, MERCEDES" and
                    $cliente->name != "AJUNTAMENT DELTEBRE" and
                    $cliente->name != "PROJECTE PRINCIPAL, S.L." and
                    $cliente->name != "VICENTE TALARN, VICTOR" and
                    $cliente->name != "ALIAU PONS, GABRIEL" and
                    $cliente->name != "BAYERRI BONANCIA, ALVARO" and
                    $cliente->name != "MARTINEZ FORNER, VICENT" and
                    $cliente->name != "MARCO PONS, OSCAR" and
                    $cliente->name != "AJUNTAMENT D'AMPOSTA" and
                    $cliente->name != "SOLER SUBIRATS, LAUREANO"
                    )

                {
                        $client = Client::create([
                            'name' => $cliente->name,
                            'email' =>$cliente->email,
                        ]);

                        $client->phone()->create([
                            'phone' => $cliente->phone1,
                        ]);
                }
                if (!empty($cliente->phone2)){
                    $client->phone()->create([
                        'phone' => $cliente->phone2,
                    ]);
                }

                if (empty($cliente->name)){
                    break;
                }
            }
        });
        return Client::all();
    }

}
