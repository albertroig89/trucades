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
    public function index()
    {
        $builder = Client::orderBy("name");
        $clients = $builder->paginate(50);
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


    public function showimport()
    {
        $title = 'Importar clients desde xlsx';
        return view('clients.import', compact('title'));
    }


    public function import()
    {
        //para recibir datos en formato json
//        $data = $request->json()->all();
        //variable que recogerá la url
//        $url = $data['url'];

        //función para importar los datos
//        Excel::load($url, function($reader) {
        Excel::load('clients.xlsx', function($reader) {

            foreach ($reader->get() as $cliente) {
                if (!empty($cliente->phone1)){
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

//                $client->phone()->create([
//                    'phone' => $cliente->phone2,
//                ]);
            }
        });
//retornar toda la información de la tabla para verificar que las inserciones que hayan realizado con éxito
        return Client::all();
    }

//    public function import()
//    {
//        Excel::load('clientes.csv', function($reader) {
//            foreach ($reader->get() as $client) {
//                Client::create([
//                    'name' => $client->name,
//                    'email' =>$client->email,
//                ]);
//            phone()->create([
//                'phone' => $client->phone,
//            ]);
//            }
//        });
//        return Client::all();
//    }

}
