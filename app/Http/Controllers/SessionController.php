<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\charges;
use App\user;
use App\users_charges;
use App\payments;
use Illuminate\Support\Facades\DB;

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
        $charges = DB::table('users_charges')
            ->where('id_charge', $id)
            ->join('users', 'id_user','=','users.id')
            ->join('charges', 'id_charge','=','charges.id')
            ->select('users.name', 'charges.id', 'charges.amount', 'users.lastname')
            ->get();

        $payed = DB::table('payments')
        ->where('id_charge', $id)
        ->join('users', 'id_debtor', '=', 'users.id')
        ->select('payments.id', 'payments.amount', 'users.name', 'payments.created_at')
        ->get();

        $arr = \Session::get('curr_session');
        return view('pages.showcharges', ['arr'=> $arr, 'charges' => $charges, 'payed' => $payed, 'acc' => $acc = 0]);

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
