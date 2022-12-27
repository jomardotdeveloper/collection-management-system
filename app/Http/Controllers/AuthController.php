<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("login");
    }

    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        if (Auth::attempt($validated, true)) {
            $request->session()->regenerate();
            // dd("HAHA");
            return redirect()->intended("/admin/dashboard");
        }
        // dd("HEHE");
        return back()->withErrors([
            "login-error" => "The provided credentials do not match our records."
        ]);
    }
}
