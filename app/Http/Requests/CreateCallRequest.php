<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use App\Call;

class CreateCallRequest extends FormRequest
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
            'user_id' => 'required',
            'client_id' => '',
            'user_id2' => 'required',
            'stat_id' => 'required',
            'callinf' => 'required',
            'clientname' => 'required',
            'clientphone' => '',
        ];
    }

    public function  messages()
    {
        return [
            'user_id.required' => 'Selecciona un empleat',
            'client_id.required' => 'Selecciona un client',
            'user_id2.required' => 'Selecciona un empleat',
            'stat_id' => 'required',
            'callinf.required' => 'Omple l\'informació de la trucada',
            'clientname.required' => 'Selecciona un client o escriu-ne un'
        ];
    }

    public function createCall()
    {
        DB::transaction (function () {

            $data = $this->validated();

            if (!empty($data['clientname']) and (!empty($data['client_id']))){
                Call::create([
                    'user_id' => $data['user_id'],
                    'client_id' => $data['client_id'],
                    'user_id2' => $data['user_id2'],
                    'stat_id' => $data['stat_id'],
                    'callinf' => $data['callinf'],
                    'clientname' => $data['clientname'],
                ]);
            }else {
                Call::create([
                    'user_id' => $data['user_id'],
                    'user_id2' => $data['user_id2'],
                    'stat_id' => $data['stat_id'],
                    'callinf' => $data['callinf'],
                    'clientname' => $data['clientname'],
                    'clientphone' => $data['clientphone'],
                ]);
            }


        });
    }
}
