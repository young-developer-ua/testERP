<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.login');
    }

    public function login(LoginRequest $loginRequest): \Illuminate\Http\RedirectResponse
    {
        $credentials = $loginRequest->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            return redirect()->route('profile.show', $user->id);
        }

        return back()->withErrors([
            'error' => 'Неправильний email або пароль.',
        ]);
    }
}
