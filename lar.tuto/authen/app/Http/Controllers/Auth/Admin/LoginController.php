<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //

    public function login(){
        return view('admin.auth.login');

    }
    public function loginAdmin(Request $request){
        $this->validate($request,array(
            'email'=>'required|email',
            'password'=>'required|min:6'
        ));

    }
    public function logout(){

    }
}
