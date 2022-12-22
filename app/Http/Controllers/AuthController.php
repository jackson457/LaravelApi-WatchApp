<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;
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
            return redirect('admin/category');
       }
       return redirect()->back()->with('error','email password wrong');
    }
    public function logout(){
        Auth::logout();
        return redirect('/admin/login');
    }
}
