<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\MakeLoginRequest;

class LoginController extends Controller
{
    public function index(){
        return view('login2');
    }

    public function login2(MakeLoginRequest $request){

        if($request->tryToLogin()){
            return to_route('dashboard2');
        }

        return back()->with(['message' => 'not found']);
    }
}

