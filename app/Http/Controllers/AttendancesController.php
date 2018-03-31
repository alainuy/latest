<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Attendance;
use Carbon\Carbon;
use DB;

class AttendancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        

        // verify first if emp_id entered is found in user db
        // if (User::where('emp_id', '=', Input::get('emp_id'))->exists()) {



        if (isset($_POST['btnIn'])) { 

            $emp_id = $request->emp_id;

                if (User::where('emp_id', '=', $emp_id)->exists()) {
                  
                    if (Attendance::where('emp_id', $emp_id)->where('if_login', 1)->first()){

                        return 'Hey, '.$emp_id.' you are ALREADY LOGGED IN';

                    }
                    else {
                  
                        $now = Carbon::now();              
                        $user_id = DB::table('users')->where('emp_id', '=', $emp_id)->value('id');

                        $timein = new Attendance;
                        $timein->emp_id = $emp_id;
                        $timein->time_in = $now;
                        $timein->user_id = $user_id;
                        $timein->if_login = 1;
                        $timein->save();    
                        
                        return 'Log IN Successful!';
                        return redirect()->back();
                    }    
                }      

                else {
                        return 'Employee ID NOT FOUND';
                }

        } else if (isset($_POST['btnOut'])) { 

            $emp_id = $request->emp_id;

                if (User::where('emp_id', '=', $emp_id)->exists()) {

                    $now = Carbon::now();

                    DB::table('attendances')
                    ->where('emp_id', $emp_id)
                    ->whereNull('time_out')
                    ->update(['time_out' => $now, 'if_login' => 0, 'updated_at' => $now]);


                    return redirect()->back();
                }
                else {
                    return 'Employeed ID NOT FOUND';
                }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
