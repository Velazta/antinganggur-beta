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

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok',
        ])->onlyInput('email');
    }

    // method logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
