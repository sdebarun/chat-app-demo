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
        $consultants = $this->topConsultants();
        return view('pages.home')->with(['consultants' => $consultants]);
    }


    public function consultants( $id = null) {
        if(!is_null($id)){
            return $id;
        }
        $consultants = $this->userModel->role('consultant')->get();
        return view('pages.consultants')->with(['consultants' => $consultants]);
    }

    public function topConsultants(){
        return $this->userModel->role('consultant')->orderBy('rating',"DESC")->limit(6)->get();
    }
}
