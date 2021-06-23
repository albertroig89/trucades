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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'department_id' => 'required',
        ];
    }

    public function  messages()
    {
        return [
            'name.required' => 'El nom es obligatori',
            'email.required' => 'Introdueix un correu electronic',
            'email.email' => 'Introdueix un correu electronic correcte',
            'email.unique' => 'El correu electronic ja existeix',
            'password.required' => 'Especifica una contrasenya',
            'password.min' => 'La contrasenya a de tenir almenys 6 caracters',
            'department_id.required' => 'El departament es obligatori'
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
                'department_id' => $data['department_id'],
            ]);

//            $user->profile()->create([
//                'bio' => $data['bio'],
//                'twitter' => $data['twitter'],
//            ]);

//            dd($user);
        });
    }
}
