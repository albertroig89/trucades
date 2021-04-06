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
            'client_id' => 'required',
            'user_id2' => 'required',
            'stat_id' => 'required',
            'callinf' => 'required',
        ];
    }

    public function  messages()
    {
        return [
            'user_id.required' => 'Sel·lecciona un empleat',
            'client_id.required' => 'Afegeix un client',
            'user_id2.required' => 'Sel·lecciona un empleat',
            'stat_id' => 'required',
            'callinf.required' => 'Omple l\'informació de la trucada'
        ];
    }

    public function createCall()
    {
        DB::transaction (function () {

            $data = $this->validated();

            $call = Call::create([
                'user_id' => $data['user_id'],
                'client_id' => $data['client_id'],
                'user_id2' => $data['user_id2'],
                'stat_id' => $data['stat_id'],
                'callinf' => $data['callinf'],
            ]);

//            $call->profile()->create([
//                'bio' => $data['bio'],
//                'twitter' => $data['twitter'],
//            ]);

//            dd($user);
        });
    }
}
