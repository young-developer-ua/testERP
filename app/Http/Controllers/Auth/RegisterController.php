<?php

namespace App\Http\Controllers\Auth;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $teamLeads = User::query()->where('role_id', RoleEnum::TEAMLEAD->value)->get();

        return view('auth.register', compact('teamLeads'));
    }

    public function register(RegisterRequest $registerRequest): \Illuminate\Http\RedirectResponse
    {
        $user = User::query()->create([
            'name' => $registerRequest->name,
            'email' => $registerRequest->email,
            'password' => Hash::make($registerRequest->password),
            'role_id' => $registerRequest->role_id,
            'team_lead_id' => $registerRequest->team_lead_id,
        ]);

        auth()->login($user);

        return redirect()->route('profile.show', $user->id)->with('success', 'Реєстрація успішна!');
    }
}
