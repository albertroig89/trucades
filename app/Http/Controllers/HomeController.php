<?php

namespace App\Http\Controllers;

use App\Call;
use App\Department;
use App\Phone;
use App\Stat;
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
        $phones = Phone::all();
        $techId = Department::where('title', 'Tecnic')->value('id');
        $globId = Department::where('title', 'Global')->value('id');
        $nStat = Stat::where('title', 'Normal')->value('id');
        $uStat = Stat::where('title', 'Urgent')->value('id');
        $pStat = Stat::where('title', 'Pendent')->value('id');


        $title = 'Trucades';
        return view('home', compact('title', 'calls', 'users', 'phones', 'techId', 'globId', 'nStat', 'uStat', 'pStat'));
    }

}
