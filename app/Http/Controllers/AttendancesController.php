<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Attendance;
use Carbon\Carbon;
use DB;
use Alert;

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
        // show currently logged in users to main page
        $actives = Attendance::where('if_login', 1)->get();
        return view('welcome')->with('actives', $actives);
        
        // return view('welcome');
    }

    
    public function active(){
 



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
            $name = DB::table('users')->where('emp_id', '=', $emp_id)->value('name');

                if (User::where('emp_id', '=', $emp_id)->exists()) {
                  
                    if (Attendance::where('emp_id', $emp_id)->where('if_login', 1)->first()){

                        Alert::info('Hey, '.$name.' you are ALREADY LOGGED IN')->persistent('OK');
                        return redirect()->back();

                    }
                    else {
                  
                        $now = Carbon::now();              
                        $user_id = DB::table('users')->where('emp_id', '=', $emp_id)->value('id');
                        $name = DB::table('users')->where('emp_id', '=', $emp_id)->value('name');

                        $timein = new Attendance;
                        $timein->emp_id = $emp_id;
                        $timein->time_in = $now;
                        $timein->user_id = $user_id;
                        $timein->if_login = 1;
                        $timein->name = $name;
                        $timein->save();    
                        
                        // return 'Log IN Successful!';

                        Alert::success('', 'Hi, '.$name.' - Time IN Success')->autoclose(4000);
                        return redirect()->back();
                    }    
                }      

                else {                    
                    Alert::error('ePLDT ID NOT FOUND', 'Oops!')->persistent('OK');
                    return redirect()->back();

                        
                }

        } else if (isset($_POST['btnOut'])) { 

            $emp_id = $request->emp_id;
            $name = DB::table('users')->where('emp_id', '=', $emp_id)->value('name');

                if (User::where('emp_id', '=', $emp_id)->exists()) {

                    $now = Carbon::now();

                    DB::table('attendances')
                    ->where('emp_id', $emp_id)
                    ->whereNull('time_out')
                    ->update(['time_out' => $now, 'if_login' => 0, 'updated_at' => $now]);

                    Alert::success('', 'Bye, '.$name.' - Time OUT Success')->autoclose(4000);
                    return redirect()->back();
                    
                }
                else {
                    Alert::error('ePLDT ID NOT FOUND', 'Oops!')->persistent('OK');
                    return redirect()->back();
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
