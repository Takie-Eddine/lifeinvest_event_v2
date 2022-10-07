<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){

        return view('admin.login');
    }


    public function postLogin(LoginRequest $request){

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")])) {
            return redirect() -> route('admin.participant.index');
        }
        return redirect()->back()->with(['error' => 'there is a problem']);

    }


    public function logout(){


        auth('admin') -> logout();
        return Redirect() -> route('admin.login');
    }


}
