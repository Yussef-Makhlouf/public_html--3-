<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{
   public function showLogin($guard)
   {
      $guard = 'admin';
      return response()->view('auth.login', compact('guard'));
   }
}
