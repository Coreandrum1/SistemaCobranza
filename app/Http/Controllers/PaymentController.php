<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\charges;
use App\payments;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr = \Session::get('curr_session');
        $items = User::where([['id_owner', $arr[0]['id']],['id','<>', $arr[0]['id']]] )->pluck('name', 'id');
        $ch = charges::where('id_owner', $arr[0]['id'])->pluck('amount', 'id');
        return view('pages.regpayments', ['arr' => $arr, 'items' => $items, 'ch' => $ch]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'charge' => 'required',
            'amount' => 'required',
            'user' => 'required'
        ]);

        $arr = \Session::get('curr_session');
        $post = new payments;
        $post->id_debtor = $request->input('user');
        $post->id_charge = $request->input('charge');
        $post->amount = $request->input('amount');
        $post->save();

        return redirect('owner');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payments = DB::table('payments')
            ->join('users','id_debtor','=','users.id')
            ->select('users.name', 'payments.id', 'payments.amount', 'users.lastname', 'payments.created_at')
            ->where('users.id_owner', $id)
            ->orderBy('users.name')
            ->get();

            $arr = \Session::get('curr_session');
            return view('pages.showpayments', ['payments' => $payments, 'arr' => $arr]);
    }

    public function bydate()
    {
        $id = \Session::get('curr_session');
        $payments = DB::table('payments')
            ->join('users','id_debtor','=','users.id')
            ->select('users.name', 'payments.id', 'payments.amount', 'users.lastname', 'payments.created_at')
            ->where('users.id_owner', $id[0]['id'])
            ->orderBy('payments.created_at')
            ->get();

            $arr = \Session::get('curr_session');
            return view('pages.showpayments', ['payments' => $payments, 'arr' => $arr]);
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
