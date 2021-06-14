<?php

namespace App\Http\Controllers;

use App\Call;
use App\Client;
use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\CreateJobFromCallRequest;
use App\Job;
use App\Stat;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $jobs = Job::all();
        $users = User::all();

        $title = 'Feines';

        return view('jobs.index', compact('title', 'jobs', 'users'));

    }

    public function show(Job $job)
    {
        $title = 'Feina';
        return view('jobs.show', compact('title', 'job'));
    }

    public function create()
    {
        $title = 'Nova feina';
        $clients = Client::all();
        $users = User::all();

        return view('jobs.create', compact('title', 'clients', 'users'));
    }

    public function edit(Job $job)
    {
        $clients = Client::all();
        $users = User::all();

        return view('jobs.edit', ['job' => $job], compact( 'clients', 'users'));
    }
    public function store(CreateJobRequest $request)
    {
        $request->createJob();
        return redirect()->route('jobs.index');
    }

    public function jobfromcall(CreateJobFromCallRequest $request)
    {
        $calls = Call::all();

        if (empty($request->delete)){
            $request->createJobFromCall();
        }else{
            $request->createJobFromCall();
            foreach ($calls as $call){
                if ($call->id === $request->delete){
                    $call->delete();

                }
            }
        }

        $request->createJobFromCall();

        return redirect()->route('jobs.index');
    }

    public function update(Job $job)
    {
        $data = request()->validate([
            'user_id' => 'required',
            'client_id' => 'required',
            'job' => 'required',
            'inittime' => 'required',
            'endtime' => 'required',
        ], [
            'user_id.required' => 'Sel·lecciona un empleat',
            'client_id.required' => 'Sel·lecciona un client',
            'job.required' => 'Introdueix la feina que has fet',
            'inittime.required' => 'Introdueix comensament de feina',
            'endtime.required' => 'Introdueix final de feina'
        ]);

        $inittime = Carbon::createFromFormat('d-m-Y H:i', $data['inittime']);
        $endtime = Carbon::createFromFormat('d-m-Y H:i', $data['endtime']);

        $data['inittime'] = $inittime;
        $data['endtime'] = $endtime;
        $data['totalmin'] = $endtime->diffInMinutes($inittime);

        $job->update($data);

        return redirect()->route('jobs.index');
    }

    function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index');
    }
}
