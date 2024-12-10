<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credendials = $request->validated();
        if (Auth::attempt($credendials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.property.index'));
        }
        return back()->withErrors([
            'email' => 'Identifiant incorrect',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login')->with('success', 'Vous êtes maintenant déconnecté');
    }
}
