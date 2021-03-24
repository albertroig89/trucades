<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'profession_id' => ['nullable'],
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
//            'email' => ['required', 'email', 'unique':users,email], FA EL MATEIX QUE LA LINEA ANTERIOR
            'password' => 'required|min:6',
            'bio' => 'required',
            'twitter' => ['nullable', 'url']
        ];
    }

    public function  messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'Introduce un correo electronico',
            'email.email' => 'Introduce un correo electronico correcto',
            'email.unique' => 'El correo introducido ya existe',
            'password.required' => 'Especifica una contraseña',
            'password.min' => 'La contraseña debe contener almenos 6 caracteres'
        ];
    }

    public function createUser()
    {
        DB::transaction (function () {

            $data = $this->validated();

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'profession_id' => $data['profession_id'],
            ]);

            $user->profile()->create([
                'bio' => $data['bio'],
                'twitter' => $data['twitter'],
            ]);

//            dd($user);
        });
    }
}
