<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistrationRequest;

class AuthenticationController extends Controller
{
    public function registration(RegistrationRequest $request){
      $requestData = [];
      $requestData = $request->except(['password', 'languages_spoken']);
      $requestData['languages_spoken'] = json_encode($request->languages_spoken);
      $requestData['password'] = Hash::make($request->password);
      $requestData['last_active_at'] = Carbon::now();
    //   return $requestData;
      $referralCode = Str::random(8);
      $requestData['referral'] = $referralCode;
      $user = User::create($requestData);
      $user->assignRole(['consultant']);
      return response()->json(['status' => true],201);

    }
}
