<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
   public function registration_page() {
    return view('auth.registration');
   }
   public function auth_page() {
      return view('auth.auth');
   }
}
