<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function __invoke(){
        /** @var User $user */
        $user = auth()->user(); 

        dd(
            $user->links(),
            $user->links()
                ->where('name', '=', 'titulo')
                ->get()
        );

        return view('dashboard2');
    }
}