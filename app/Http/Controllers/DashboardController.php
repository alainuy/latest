<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
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
        return view('/dashboard');
    }

    // public function store(Request $request)
    // {
    //     $emp_id = $request->emp_id;

    //     // verify first if emp_id entered is found in user db
    //     if (User::where('emp_id', '=', Input::get('emp_id'))->exists()) {

        

    //     };
    // }
}
