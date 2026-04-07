<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\UserWelcomeMail;

class CmsUserController extends Controller
{
    public function index()
    {
        if (!auth()->user()->is_super_admin) abort(403);
        
        $users = User::orderBy('created_at', 'desc')->get();
        return view('cms.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        if (!auth()->user()->is_super_admin) abort(403);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $password = Str::random(10);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
        ]);

        try {
            Mail::to($user->email)->send(new UserWelcomeMail($user, $password));
        } catch (\Exception $e) {
            report($e);
        }

        return back()->with('success', "L'utilisateur {$user->name} a été créé. Un email a été envoyé à {$user->email}.");
    }

    public function destroy($id)
    {
        if (!auth()->user()->is_super_admin) abort(403);

        if (auth()->id() == $id) {
            return back()->with('error', "Vous ne pouvez pas supprimer votre propre compte.");
        }

        User::destroy($id);
        return back()->with('success', "Utilisateur supprimé avec succès.");
    }
}
