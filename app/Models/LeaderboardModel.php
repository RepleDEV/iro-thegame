<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class LeaderboardModel {
    public static function get_data() {
        return DB::table('games')->orderBy('final_time','asc')->take(100)->get();
    }
    public static function write($data) {
        return DB::table('games')->insert($data);
    }
}
