<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() 
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ]);

        if (Auth::attempt(['username' => $request->input('username'), 
        'password' => $request->input('password')])) {
            $request->session()->regenerate();
 
            return redirect()->intended('home');
        }

        return back()->with([
            'loginError' => 'Username atau Password Salah',
            
        ]);

        
    }
    
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');

    }
}
