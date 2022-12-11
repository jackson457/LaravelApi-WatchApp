<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin(){
        if(auth()->user()){
            return redirect('/admin');
        }
        return view('admin.login');
    
    }
    public function postLogin(Request $req){
       $cred = $req->only('email','password');
       if(Auth::attempt($cred)){
            if(auth()->user()->is_admin=='yes'){
                return redirect('admin');
            }
            return redirect()->back();
       }
       return redirect()->back();
    }
    public function logout(){
        Auth::logout();
        return redirect('/admin/login');
    }
}
