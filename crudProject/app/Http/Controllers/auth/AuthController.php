<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function registerForm()
  {
    return view("auth.register");
  }

  public function register(Request $request)
  {
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);

    $user->save();

    // return back()->with("success","you are successfully registered");
    return redirect()->route("home");

  }

  public function loginForm()
  {
    return view("auth.login");
  }

  public function login(Request $request)
  {
    $email = $request->email ;
    $password = $request->password;

    $credetials = [
      "email" => $email,
      "password" => $password 
    ];

    if(Auth::attempt($credetials)){
      return redirect()->route("home");
    }
    else {
      return back()->with("error","Try to verify your email or your password !");
    }
  }


  public function logout()
    {
        Auth::logout();

        return redirect()->route("login");
    }
}
