<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Attendance;
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
        $emp_id = $request->emp_id;

        // verify first if emp_id entered is found in user db
 
        // if (User::where('emp_id', '=', Input::get('emp_id'))->exists()) {
        if (User::where('emp_id', '=', $emp_id)->exists()) {


            $usr_id = DB::table('users')->where('emp_id', '=', $emp_id)->select('id')->get();
            
            
            
            // $post = new Attendance;
            // $post->emp_id = $request -> input('title');
            // $post->body = $request -> input('body');
            // $post->user_id = auth()->user()->id;
            // $post->save();
    
            
            // return 'emp_id to be save in db';
            return $usr_id;


        }      
        else {
            return 'Employee ID NOT FOUND';
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
