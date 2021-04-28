<?php

namespace App\Http\Controllers;

use App\Job;
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

        $title = 'Feines';
//        dd($users);
        return view('jobs.jobs', compact('title', 'jobs'));

    }

    public function calls() {

        $calls = Job::all();

        $title = 'Trucades';
//        dd($users);
        return view('jobs.calls', compact('title', 'calls'));

    }
}
