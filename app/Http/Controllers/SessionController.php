<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\charges;
use App\user;
use App\users_charges;

class SessionController extends Controller
{

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arr = \Session::get('curr_session');
        $charges = users_charges::where('id_charge', $id)->with('user')->get();
        return view('pages.showcharges', ['arr'=> $arr, 'charges' => $charges]);

    }


    public function retrieve()
    { 
        $arr = \Session::get('curr_session');
        $data = charges::where('id_owner', $arr[0]['id'])->get();
        return view('pages.charges', ['arr'=> $arr, 'data' => $data]);
    }

    public function retrieveGuest(){
        $arr = \Session::get('curr_session');
        return view('pages.debtor')->with('arr', $arr);
    }
    public function flush(){
        Auth::logout();
        \Session::forget('key');
        \Session::flush();
  
        return redirect('/login');
    }

    public function check(){
       // \Session::flush();
        dd(\Session::get('curr_session'));
    }


}
