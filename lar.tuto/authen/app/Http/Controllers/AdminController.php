<?php

namespace App\Http\Controllers;

use App\Model\AdminModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index(){
        return view('admin.dashboard');
    }
    public function create(){
        return view('admin.auth.register');
    }
    public function store(Request $request){
        $this->validate($request,array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ));


        $adminModel=new AdminModel();
        $adminModel->name = $request->name;
        $adminModel->email = $request->email;
        $adminModel->password = bcrypt($request->password);
        $adminModel->save();

        return redirect('register','AdminController@store')->name('admin.register.store');


        Route::get('login','Auth\Admin\LoginController@login')->name('admin.auth.login');

        Route::post('logn','Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');


        Route::post('logout','Auth\Admin\LoginController@logout')->name('admin.auth.logout');

    }
}
