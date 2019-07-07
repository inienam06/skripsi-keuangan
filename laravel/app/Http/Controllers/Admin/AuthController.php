<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

use App\Admin;

class AuthController extends Controller
{
    function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
    }

    function form()
    {
        return view('admin.login');
    }

    function login(Request $req)
    {
        $email = trim($req->email);
        $password = custom_crypt(trim($req->password), 'd');

        $admin = Admin::where(['email' => $email, 'password' => $password])->first();

        if(empty($admin))
        {
            session()->flash('gagal', 'E-mail atau Password salah');

            return redirect()->route('admin.login')->withInput($req->all());
        }
        else
        {
            Auth::guard('admin')->login($admin);

            return redirect()->intended(route('admin'));
        }
    }

    function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }

}
