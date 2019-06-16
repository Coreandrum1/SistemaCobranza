<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Auth;

class LoginController extends Controller
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
        //
    }

    public function flush()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //This will validate that blanks are filled
        $this->validate($request, [
            'phone' => 'required',
            'password' => 'required'
        ]);

       //compare if there is a user with same entered credentials
        $website_info = User::where([
            ['phonenumber', '=', $request->input('phone')],
            ['password', '=', $request->input('password')]
        ])->first(); //get the first match  


        
            if (sizeof($website_info) > 0){
                //if there is a matching result, 
                if(\Session::get('curr_session')){                     //
                    \Session::flush();
                    \Session::push('curr_session',$website_info);      //this will delete
                }
                else{
                    \Session::push('curr_session',$website_info);
                }

                if($website_info->id == $website_info->id_owner){
                    return redirect('/owner');
                }
                else{
                    return redirect('/debtor');
                }
                
                

            }
            else {        
                return redirect('login');
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
