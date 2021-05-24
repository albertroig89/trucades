<?php

namespace App\Http\Controllers;

use App\Call;
use App\Client;
use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\CreateJobToCallRequest;
use App\Job;
use App\Stat;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobController extends Controller
{

//    public function index($name)
//    {
//        $nickname=null;
//        $name = ucfirst($name);
//        $title = 'Pagina de bienvenida Usuarios';
//        return view('saludo', compact('name', 'nickname', 'title'));
//    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $jobs = Job::all();
        $users = User::all();

        $title = 'Feines';
//        dd($users);
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

    public function jobfromcall(CreateJobToCallRequest $request)
    {
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

        Job::update([
            'user_id' => $data['user_id'],
            'client_id' => $data['client_id'],
            'job' => $data['job'],
            'inittime' => $inittime,
            'endtime' => $endtime,
            'totalmin' => $endtime->diffInMinutes($inittime),
        ]);

        return redirect()->route('jobs.index');
    }

    function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index');
    }
}
