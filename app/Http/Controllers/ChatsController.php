<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatsController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index() {
        return true;
    }

    public function fetchMessages(){
        return true;
    }

    public function sendMessage(){
        return true;
    }
}
