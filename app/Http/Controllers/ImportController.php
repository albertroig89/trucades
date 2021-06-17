<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;


class ImportController extends Controller
{

    public function import()
    {
        //para recibir datos en formato json
//        $data = $request->json()->all();
        //variable que recogerá la url
//        $url = $data['url'];

        //función para importar los datos
//        Excel::load($url, function($reader) {
        Excel::load('clients.xlsx', function($reader) {

// realizar un recorrido por todo el archivo e insertar los datos que tengan ciertos atributos como encabezado
            foreach ($reader->get() as $cliente) {
                $client = Client::create([
                    'name' => $cliente->name,
                    'email' =>$cliente->email,
                ]);

                $client->phone()->create([
                    'phone' => $cliente->phone1,
                ]);

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
