<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    function login(){
        if(Auth::check()){
            return redirect(route('userHome'));
        }
        return view('login');
    }

    function registration(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('registration');
    }

    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('userHome'));
        }
        return redirect(route('login'))->with("error", "Not Valid");
    }

    function registrationPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = Admin::create($data);

        if(!$user){
            return redirect(route('registration'))->with("error", "Try Again.");
        }
        return redirect(route('login'))->with("success", "success");

    }


    function adminLogin(){
        if(Auth::check()){
            return redirect(route('adminDashboard'));
        }
        return view('admin/adminLogin');
    }

    function adminRegistration(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('admin/adminRegistration');
    }

    function adminLoginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('adminDashboard'));
        }
        return redirect(route('adminLogin'))->with("error", "Not Valid");
    }

    function adminRegistrationPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        if(!$user){
            return redirect(route('adminRegistration'))->with("error", "Try Again.");
        }
        return redirect(route('adminLogin'))->with("success", "success");

    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('home'));
    }
}
