<?php

namespace App\Http\Controllers;

use App\Models\AstrologyCategory;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * it drives the website pages 
 * No auth routes actions should be placed here. 
 * the pages should ideally be placed in views.pages
 */
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
            $consultant = $this->userModel->find($id);
            return !is_null($consultant) ? view('pages.consultant-detail')->with(['consultant' => $consultant]) : abort(404);
        }
        $consultants = $this->userModel->role('consultant')->get();
        return view('pages.consultants')->with(['consultants' => $consultants]);
    }

    public function topConsultants(){
        return $this->userModel->role('consultant')->with('astrologyCategories')->orderBy('id',"DESC")->limit(6)->get();
    }

    public function allCategories() {
        return AstrologyCategory::get()->toArray();
    }
}
