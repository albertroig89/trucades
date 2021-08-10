<?php

namespace App\Http\Controllers;

use App\Call;
use App\Client;
use App\HistJob;
use App\HistJob2;
use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\CreateJobFromCallRequest;
use App\Job;
use App\User;
use Carbon\Carbon;

class JobController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $jobs = Job::orderBy('created_at', 'DESC')->paginate(50);
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
                if ($call->id === (int)$request->delete){
                    $call->delete();
                }
            }
        }
        return redirect()->route('jobs.index');
    }

    public function update(Job $job)
    {
        $data = request()->validate([
            'user_id' => 'required',
            'client_id' => '',
            'job' => 'required',
            'inittime' => 'required',
            'endtime' => 'required',
            'clientname' => 'required',
        ], [
            'user_id.required' => 'Selecciona un empleat',
            'clientname.required' => 'Selecciona un client o escriu-ne un',
            'job.required' => 'Introdueix la feina que has fet',
            'inittime.required' => 'Introdueix comensament de feina',
            'endtime.required' => 'Introdueix final de feina',
        ]);

        $inittime = Carbon::createFromFormat('d-m-Y H:i', $data['inittime']);
        $endtime = Carbon::createFromFormat('d-m-Y H:i', $data['endtime']);

        $data['inittime'] = $inittime;
        $data['endtime'] = $endtime;
        $data['totalmin'] = $endtime->diffInMinutes($inittime);

        $job->update($data);

        return redirect()->route('jobs.index');
    }

    public function histjob()
    {
        $histjobs = HistJob::orderBy('created_at', 'DESC')->paginate(50);
        $title = "Historic de feines";

        return view('jobs.histjobs', compact('title', 'histjobs'));

    }

    public function histjob2()
    {
        $histjobs = HistJob2::orderBy('created_at', 'DESC')->paginate(50);
        $title = "Historic de feines ocult";

        return view('jobs.histjobs2', compact('title', 'histjobs'));

    }


    public function count()
    {
        $jobs = Job::all();
        $users = User::all();
        $histjobs = HistJob::all();
        $histjobs2 = HistJob2::all();

        $title = 'Contador';

        return view('jobs.count', compact('title', 'jobs', 'users', 'histjobs', 'histjobs2'));
    }

    function histdestroy(HistJob $histjob)
    {
        HistJob2::create([
            'username' => $histjob->username,
            'job' => $histjob->job,
            'inittime' => $histjob->inittime,
            'endtime' => $histjob->endtime,
            'totalmin' => $histjob->totalmin,
            'clientname' => $histjob->clientname,
        ]);

        $histjob->delete();
        return redirect()->route('jobs.histjobs');
    }

    function destroy(Job $job)
    {
        HistJob::create([
            'username' => $job->user->name,
            'job' => $job->job,
            'inittime' => $job->inittime,
            'endtime' => $job->endtime,
            'totalmin' => $job->totalmin,
            'clientname' => $job->clientname,
        ]);

        $job->delete();
        return redirect()->route('jobs.index');
    }
}
