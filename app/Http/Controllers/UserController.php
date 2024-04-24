<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(Private User $userModel)
    {
        //
    }

    public function getConsultants($id = null){
        if(!is_null($id)){
            return $id;
        }
        return $consultants = $this->userModel->role('consultant')->get();
    }


}
