<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm() {
        return view('admin.auth.login');
    }

    public function login(Request $request) {

        $request ->validate([
            'email' => 'requeired|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();
            // 3. Jika berhasil, redirect ke dashboard admin
            return redirect()->route('admin.dashboard');
        }

        return back() ->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok',
        ])->onlyInput('email');

    }
}
