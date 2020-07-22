<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaderboardModel;

class WinController extends Controller
{
    public function index(Request $request) {
        LeaderboardModel::write([
            "username" => $request->username,
            "time" => $request->time,
            "user_id" => $request->user_id,
        ]);
        return;
    }
}
