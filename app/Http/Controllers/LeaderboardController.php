<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LeaderboardModel;
use App\Models\UsersModel;

class LeaderboardController extends Controller
{
    public function get_leaderboard() {
        $leaderboard = LeaderboardModel::get_data();
        $arr = [];
        foreach ($leaderboard as $row) {
            array_push($arr, [
                "username"=>UsersModel::get_by_id($row->user_id)->username,
                "final_time"=>$row->final_time,
                "final_color"=>$row->final_color,
                "user_id"=>$row->user_id,
            ]);
        }
        return $arr;
    }
}
