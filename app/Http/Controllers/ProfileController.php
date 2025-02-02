<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{  
    public function index(){
        return view('profile', [
            'user' => auth()->user(),
        ]);
    }

    public function update(ProfileRequest $request){
        /** @var User */
        $user = auth()->user();

        $user->fill($request->validated())->save();

        return back()->with('message', 'Profile atualizado com sucesso');
    }
}