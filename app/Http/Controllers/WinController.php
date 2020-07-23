<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\LeaderboardModel;
use App\Models\UsersModel;

class WinController extends Controller
{
    public function index(Request $request) {
        LeaderboardModel::write([
            "final_time"=>$request->final_time,
            "final_color"=>$request->final_color,
            "user_id"=>$request->user_id
        ]);
        if ($request->is_best_time) {
            UsersModel::update_by_id($request->user_id, 'best_time',$request->time);
        }
        return;
    }
}
