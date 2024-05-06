<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\AstrologyCategory;

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
            $consultant = $this->userModel->where('is_active',1)->with('astrologyCategories')->find($id);
            return !is_null($consultant) ? view('pages.consultant-detail')->with(['consultant' => $consultant]) : abort(404);
        }
        $consultants = $this->userModel->where('is_active', 1)->role('consultant')->with(['astrologyCategories'])->get();
        return view('pages.consultants')->with(['consultants' => $consultants]);
    }

    public function topConsultants(){
        return $this->userModel->role('consultant')->with('astrologyCategories')->orderBy('rating',"DESC")->limit(6)->get();
    }

    public function allCategories() {
        return AstrologyCategory::get()->toArray();
    }

    public function contactUs(){
        return view('pages.contact-us');
    }

    public function getStates(){
        $states = State::where('country_id', 101)->get();
        return response()->json($states);
    }

    public function products(){
        return view('pages.product.index');
    }
}
