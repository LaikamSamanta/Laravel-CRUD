<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/tasks') ->with('success', 'Esi veiksmīgi ielogojies!');
        }

        return back()->withErrors([
            'login-error' => 'Ielogoties neizdevās. Lūdzu, pārbaudiet savu e-pastu un paroli.',
        ]);
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/tasks') ->with('success', 'Esi veiksmīgi izlogojies!');
    }
}
