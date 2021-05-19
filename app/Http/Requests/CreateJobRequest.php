<?php

namespace App\Http\Requests;

use App\Job;
use Carbon\Carbon;
use DateTime;
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
            'client_id' => 'required',
            'job' => 'required',
            'inittime' => 'required',
            'endtime' => 'required',
        ];
    }

    public function  messages()
    {
        return [
            'user_id.required' => 'Sel·lecciona un empleat',
            'client_id.required' => 'Sel·lecciona un client',
            'job.required' => 'Introdueix la feina que has fet',
            'inittime.required' => 'Introdueix comensament de feina',
            'endtime.required' => 'Introdueix final de feina'
        ];
    }

    public function createJobFromCall()
    {
        DB::transaction (function () {

            $data = $this->validated();

            $call = Job::create([
                'user_id' => $data['user_id'],
                'client_id' => $data['client_id'],
                'job' => $data['job'],
                'inittime' => $data['inittime'],
                'endtime' => $data['endtime'],
            ]);

//            $call->profile()->create([
//                'bio' => $data['bio'],
//                'twitter' => $data['twitter'],
//            ]);

//            dd($user);
        });
    }

    public function createJob()
    {
        DB::transaction (function () {

            $data = $this->validated();

//            $inittime = Carbon::parse($data['inittime'])->format('d-m-Y H:m');
//            $endtime = Carbon::parse($data['endtime'])->format('d-m-Y H:m');

            $inittime = Carbon::createFromFormat('d-m-Y H:m', $data['inittime']);
            $endtime = Carbon::createFromFormat('d-m-Y H:m', $data['endtime']);

            Job::create([
                'user_id' => $data['user_id'],
                'client_id' => $data['client_id'],
                'job' => $data['job'],
                'inittime' => $inittime,
                'endtime' => $endtime,
                'totalmin' => $endtime->diffInMinutes($inittime),
            ]);
        });
    }
}
