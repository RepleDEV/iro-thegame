<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LeaderboardModel;
use App\Models\UsersModel;

class LeaderboardController extends Controller
{
    public function get_leaderboard() {
        $leaderboard = [LeaderboardModel::get_by_diff('easy'),LeaderboardModel::get_by_diff('medium'),LeaderboardModel::get_by_diff('hard')];
        $arr = [];
        for ($i = 0;$i < count($leaderboard);$i++) {
            $diff = $leaderboard[$i];
            array_push($arr, []);
            foreach ($diff as $row) {
                array_push($arr[$i], [
                    "username"=>UsersModel::get_by_id($row->user_id)->username,
                    "final_time"=>$row->final_time,
                    "final_color"=>$row->final_color,
                    "user_id"=>$row->user_id,
                ]);
            }
        }
        return $arr;
    }
}
