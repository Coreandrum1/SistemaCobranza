<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PagesController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function login(){
        return view('pages.login');
    }

    public function mainOwner(){
        return view('pages.charges');
    }
}
