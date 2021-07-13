<?php

namespace App\Http\Controllers;

use App\Call;
use App\Department;
use App\Phone;
use App\Stat;
use App\User;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        $title = 'Trucades';
        $users = User::all();
        $phones = Phone::all();
        $techId = Department::where('title', 'Tecnic')->value('id');
        $admId = Department::where('title', 'Administracio')->value('id');
        $globId = Department::where('title', 'Global')->value('id');
        $nStat = Stat::where('title', 'Normal')->value('id');
        $uStat = Stat::where('title', 'Urgent')->value('id');
        $pStat = Stat::where('title', 'Pendent')->value('id');

        $globalId = User::where('name', 'Global')->value('id');

        $allcalls = false;

        if (!empty($request->get('user_id')) and $request->get('user_id') == "100"){
            $allcalls = true;
            $userid = User::where('id', auth()->id())->value('id');
            $usuari = User::find($userid);
        }
        elseif (empty($request->get('user_id'))){
            $userid = User::where('id', auth()->id())->value('id');
            $usuari = User::find($userid);
        }
        else{
            $userid = User::where('id', $request->get('user_id'))->value('id');
            $usuari = User::find($userid);
        }

        if (empty($request->get('user_id')) and auth()->user()->department_id === $techId) {
            $calls = Call::whereIn('user_id', [auth()->id(), $globalId])->orderBy('user_id', 'DESC')->orderBy('stat_id')->orderBy('created_at', 'DESC')->paginate(50);
        }else if (empty($request->get('user_id')) and auth()->user()->department_id === $admId) {
            $calls = Call::orderBy('created_at', 'DESC')->paginate(100);
            $allcalls = true;
        } else if (empty($request->get('user_id'))) {
            $calls = Call::where('user_id', auth()->id())->orderBy('stat_id')->orderBy('created_at', 'DESC')->paginate(50);
        } else if ($request->get('user_id') == "100") {
            $calls = Call::orderBy('created_at', 'DESC')->paginate(100);
        } else {
            $calls = Call::where('user_id', $request->get('user_id'))->orderBy('stat_id')->orderBy('created_at', 'DESC')->paginate(50);
        }

        return view('home', compact('title', 'calls', 'users', 'phones', 'techId', 'globId', 'nStat', 'uStat', 'pStat', 'usuari', 'allcalls'));
    }

}
