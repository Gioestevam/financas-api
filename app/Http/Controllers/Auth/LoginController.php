<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {


    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request) {
        
    }

}
