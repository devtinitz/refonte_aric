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
        // Simplistic login for evaluation. 
        // In production, this would use proper credentials.
        Auth::loginUsingId(1);
        
        return redirect('/')->with('success', 'Bienvenue dans le CMS ARIC !');
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
