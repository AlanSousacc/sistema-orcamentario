<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;

  protected $redirectTo = RouteServiceProvider::HOME;
  protected $username;

  public function __construct()
  {
    $this->middleware('guest')->except('logout');
    $this->username = 'username';
  }

  public function login(Request $request)
  {
    $this->validate($request, [
      'username' => 'required',
      'password' => 'required',
    ]);

    $remember = $request->has('remember') ? true : false;

    if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')], $remember)){
      $user = auth()->user();
      Auth::login($user,true);

      return redirect()->route('home')->with('success', 'Bem-Vindo de volta, '. $user->name);
    }else{
      return back()->with('error','Seu username e/ou senha estão errados!');
    }
  }

  public function username(){
    return $this->username;
  }
}
