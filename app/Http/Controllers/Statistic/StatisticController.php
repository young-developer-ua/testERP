<?php

namespace App\Http\Controllers\Statistic;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserStatisticResource;
use App\Services\UserStatisticsService;

class StatisticController extends Controller
{
    private UserStatisticsService $userStatisticsService;

    public function __construct(UserStatisticsService $userStatisticsService)
    {
        $this->userStatisticsService = $userStatisticsService;
    }
    
    public function show(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = auth()->user();
        $users = $this->userStatisticsService->getUserStatistics($user);

        $statistics = UserStatisticResource::collection($users)->resolve();

        return view('statistic.statistic', compact('statistics'));
    }
}
