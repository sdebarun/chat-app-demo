<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistrationRequest;

class AuthenticationController extends Controller
{
    public function consultantRegistration(RegistrationRequest $request){
      $requestData = [];
      $requestData = $request->except(['password', 'languages_spoken','categories']);
      $requestData['languages_spoken'] = json_encode($request->languages_spoken);
      $requestData['password'] = Hash::make($request->password);
      // $requestData['last_active_at'] = Carbon::now();
      $requestData['deleted_at'] =  Carbon::now();
      $categories = $request->categories;
    //   return $requestData;
      $referralCode = Str::random(8);
      $requestData['referral'] = $referralCode;
      $user = User::create($requestData);
      $user->astrologyCategories()->attach($categories,['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
      $user->assignRole(['consultant']);
      return response()->json(['status' => true],201);
    }
}
