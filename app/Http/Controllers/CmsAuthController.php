<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CmsAuthController extends Controller
{
    /**
     * Show the login page.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('cms.login');
    }

    /**
     * Handle the login request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Bienvenue dans le CMS ARIC !');
        }

        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    /**
     * Handle the logout request.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
