<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
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

    public function jobs() {

        $jobs = Job::all();

        $title = 'Treballs';
//        dd($users);
        return view('jobs.jobs', compact('title', 'jobs'));

    }
}
