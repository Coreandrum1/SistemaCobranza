<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\charges;
use App\users_charges;

class ChargesController extends Controller
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
        $items = User::whereColumn('id',"<>", 'id_owner')->pluck('name', 'id');
        $arr = \Session::get('curr_session');
        return view('pages.regcharge', ['arr' => $arr, 'items' => $items]);
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
            'debtor' => 'required',
            'amount' => 'required',
        ]);

        $arr = \Session::get('curr_session');

        $list = $request->input('debtor');
        //$list = implode(',', $list);

        $post = new charges;
        $post->amount = $request->input('amount');
        $post->id_owner = $arr[0]['id'];
        $post->save();
        $items = charges::max('id');

        for($i = 0; $i < sizeof($list);$i++){
            $post2 = new users_charges;
            $post2->id_charge = $items;
            $post2->id_user = $list[$i];
            $post2->save();    
        };

        

        


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
