<?php

namespace App\Http\Controllers\User;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateRequest;
use App\Http\Resources\ProfileResource;
use App\Models\User;
use App\Services\UserProfileService;

class ProfileController extends Controller
{
    private UserProfileService $userProfileService;

    public function __construct(UserProfileService $userProfileService)
    {
        $this->userProfileService = $userProfileService;
    }
    
    public function show(User $user): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $this->authorize('show', $user);

        $userData = ProfileResource::make($user)->resolve();

        return view('profile.show', compact('userData'));
    }

    public function edit(User $user): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $this->authorize('update', $user);

        $teamLeads = $this->userProfileService->getTeamLeads();

        return view('profile.edit', compact('user', 'teamLeads'));
    }

    public function update(UpdateRequest $updateRequest, User $user): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('update', $user);

        $this->userProfileService->updateUser($updateRequest, $user);

        return redirect()->route('profile.show', $user->id)->with('success', 'Профіль успішно оновлено!');
    }

    public function logout(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        auth()->logout();

        return redirect('/');
    }
}
