<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct(Private User $userModel)
    {
        //
    }
    public function index() {
        return view('pages.home');
    }


    public function consultants( $id = null) {
        if(!is_null($id)){
            return $id;
        }
        $consultants = $this->userModel->role('consultant')->get();
        return view('pages.consultants')->with(['consultants' => $consultants]);
    }
}
