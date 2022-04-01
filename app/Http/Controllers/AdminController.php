<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function index()
    {
        //
        $data = Admin::all();

        return response()->view('log', ['admins' => $data]);
    }
    public function showLogin()
    {
        return response()->view('log');
    }
    public function adminLogin(Request $request)
    {
       
        $request->validate([ 
            'email' => 'required|email',
            'password' => 'required|string|min:1|max:20',
            
        ]);

        $credentials = ['email' => $request->input('email'), 'password' => $request->input('password')];
    if (Auth::guard('admin')->attempt($credentials)) {
        return  redirect()->route('dashboard-home');
    } else {
        return  redirect()->back();

    }
}

    //public function logout(Request $request)
    //{
        //auth('admin')->logout();

     //   AUth::guard('admin')->logout();
       // $request->session()->invalidate();
       // return redirect()->route('auth.login-view');

        
    //}
    
   
}
