<?php

namespace App\Http\Controllers;

use App\Call;
use App\Client;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calls = Call::all();
        $users = User::all();

        $title = 'Trucades';
        return view('home', compact('title', 'calls', 'users'));
    }

}
