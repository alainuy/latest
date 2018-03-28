<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\User;
use DB;

class DashboardController extends Controller
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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('/dashboard')->with('attendances', $user->attendances);
    }

    // public function store(Request $request)
    // {
    //     $emp_id = $request->emp_id;

    //     // verify first if emp_id entered is found in user db
    //     if (User::where('emp_id', '=', Input::get('emp_id'))->exists()) {

        

    //     };
    // }
}
