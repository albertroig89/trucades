<?php

namespace App\Http\Requests;

use App\Job;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\DB;

class CreateJobRequest extends FormRequest
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
            'job' => 'required',
            'inittime' => 'required',
            'endtime' => 'required',
            'clientname' => 'required',
        ];
    }

    public function  messages()
    {
        return [
            'user_id.required' => 'Selecciona un empleat',
            'clientname.required' => 'Selecciona un client o escriu-ne un',
            'job.required' => 'Introdueix la feina que has fet',
            'inittime.required' => 'Introdueix comensament de feina',
            'endtime.required' => 'Introdueix final de feina'
        ];
    }

    public function createJob()
    {
        DB::transaction (function () {

            $data = $this->validated();

            $inittime = Carbon::createFromFormat('d-m-Y H:i', $data['inittime']);
            $endtime = Carbon::createFromFormat('d-m-Y H:i', $data['endtime']);


            if (!empty($data['clientname']) and (!empty($data['client_id']))){
                Job::create([
                    'user_id' => $data['user_id'],
                    'client_id' => $data['client_id'],
                    'job' => $data['job'],
                    'inittime' => $inittime,
                    'endtime' => $endtime,
                    'totalmin' => $endtime->diffInMinutes($inittime),
                    'clientname' => $data['clientname'],
                ]);
            }else {
                Job::create([
                    'user_id' => $data['user_id'],
                    'job' => $data['job'],
                    'inittime' => $inittime,
                    'endtime' => $endtime,
                    'totalmin' => $endtime->diffInMinutes($inittime),
                    'clientname' => $data['clientname'],
                ]);
            }


        });
    }
}
