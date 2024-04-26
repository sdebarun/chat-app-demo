<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index(){
        $user = \Auth::user();
        return view('dashboard')->with(['user' => $user]);
    }
}
