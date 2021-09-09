<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::check()){
            return redirect()->route('homeadmin.index');
        }
        return view('admin.layout.login');
    }


    public function postLogin(Request $request){
        $login = $request->only(['email','password']);
        // $user = User::where('email',)
        // $login['role'] = 'admin';
        if(Auth::attempt($login)){
            return redirect()->route('homeadmin.index');
        }
        $messages = 'message.error_login';         
        return redirect()->route('admin.index')->withMessage(__($messages));
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('homeadmin.index');
    }
}
