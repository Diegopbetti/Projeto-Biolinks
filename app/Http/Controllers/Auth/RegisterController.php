<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register2');
    }

    public function register2(RegisterRequest $request){
        if($request->tryToRegister()){
            return to_route('dashboard');
        }
        return back()->with(['message' => 'Deu ruim']);
    }
}
