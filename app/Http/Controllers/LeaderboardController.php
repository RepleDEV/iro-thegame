<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LeaderboardModel;

class LeaderboardController extends Controller
{
    public function get_leaderboard() {
        return LeaderboardModel::get_data();
    }
}
