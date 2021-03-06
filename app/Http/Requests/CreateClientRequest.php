<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use App\Client;

class CreateClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'unique:users,email',
            'phone' => 'required',
            'phones' => '',
        ];
    }

    public function  messages()
    {
        return [
            'name.required' => 'Introdueix un nom per al client',
            'email.unique' => 'El correu introduit ja exiteix',
            'phone.required' => 'Introdueix un telefon'
        ];
    }

    public function createClient()
    {
        DB::transaction (function () {

            $data = $this->validated();

            $client = Client::create([
                'name' => $data['name'],
                'email' => $data['email'],
            ]);

            $client->phone()->create([
                'phone' => $data['phone'],
            ]);

            if (!empty($data['phones'])) {
                $phones = $data['phones'];
                foreach($phones as $phone){
                    $client->phone()->create([
                        'phone' => $phone,
                    ]);
                }
            }

        });
    }
}
