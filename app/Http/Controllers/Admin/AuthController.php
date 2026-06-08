<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        if(Auth::attempt($credential)){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->with('error','Login Failed');
        }

    }

        public function logout()
    {
        Auth::logout();
        return redirect()->route('login.page');
    }
}
