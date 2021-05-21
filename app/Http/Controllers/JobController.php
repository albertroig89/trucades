<?php

namespace App\Http\Controllers;

use App\Call;
use App\Client;
use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\CreateJobToCallRequest;
use App\Job;
use App\Stat;
use App\User;
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
        $stats = Stat::all();

        return view('jobs.create', compact('title', 'clients', 'users', 'stats'));
    }

    public function edit(Job $job)
    {
        $clients = Client::all();
        $users = User::all();
        $stats = Stat::all();

        return view('jobs.edit', ['job' => $job], compact( 'clients', 'users', 'stats'));
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

    public function update(Call $call)
    {
        $data = request()->validate([
            'user_id' => 'required',
            'client_id' => 'required',
            'user_id2' => 'required',
            'stat_id' => 'required',
            'callinf' => 'required',
        ], [
            'user_id.required' => 'Sel·lecciona un empleat',
            'client_id.required' => 'Sel·lecciona un client',
            'user_id2.required' => 'Sel·lecciona un empleat',
            'stat_id' => 'required',
            'callinf.required' => 'Omple l\'informació de la trucada'
        ]);

        $call->update($data);

        return redirect()->route('home');
    }

    function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index');
    }
}
