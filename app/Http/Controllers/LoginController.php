<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin() {
        return view('authenticate.login');
    }

    public function postLogin(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return back()->withErrors([
            'login_failed' => 'Sai username hoặc mật khẩu.'
        ]);
    }

    public function getRegister() {
        return view('authenticate.register');
    }

    public function postRegister(Request $request) {
        $credentials = $request->validate([
            'fullname' => ['required'],
            'username' => ['required', 'email'],
            'password' => ['required'],
        ]);
        //$credentials['password'] = bcrypt($credentials['password']);
        $info = [
            'name' => $credentials['fullname'],
            'email' => $credentials['username'],
            'password' => bcrypt($credentials['password'])
        ];
        User::create($info);
        return redirect()->route('get-login');
    }
}
