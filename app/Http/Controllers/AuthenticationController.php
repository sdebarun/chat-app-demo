<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistrationRequest;

class AuthenticationController extends Controller
{
  public function consultantRegistration(RegistrationRequest $request)
  {
    $requestData = [];
    $requestData = $request->except(['password', 'languages_spoken', 'categories']);
    $requestData['languages_spoken'] = json_encode($request->languages_spoken);
    $requestData['password'] = Hash::make($request->password);
    // $requestData['last_active_at'] = Carbon::now();
    $requestData['is_active'] = false;
    $categories = $request->categories;
    //   return $requestData;
    $referralCode = Str::random(8);
    $requestData['referral'] = $referralCode;
    $user = User::create($requestData);
    $user->astrologyCategories()->attach($categories, ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
    $user->assignRole(['consultant']);
    return response()->json(['status' => true], 201);
  }

  public function showLoginForm()
  {
    return view('auth.login');
  }

  public function register()
  {
    return view('auth.register');
  }

  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($credentials) && Auth::user()->is_active) {
      $request->session()->regenerate();

      return response()->json(['success' => true], 204);
    }

    return response()->json([
      'message' => 'The provided credentials do not match our records.',
    ], 404);
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return $request->wantsJson()
      ? new JsonResponse([], 204)
      : redirect('/');
  }
}
