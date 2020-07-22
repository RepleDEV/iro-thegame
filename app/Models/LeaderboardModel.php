<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class LeaderboardModel {
    public static function get_data() {
        return DB::table('leaderboard')->get();
    }
    public static function write($data) {
        return DB::table('leaderboard')->insert($data);
    }
}
