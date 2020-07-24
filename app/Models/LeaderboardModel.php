<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class LeaderboardModel {
    public static function get_data() {
        return DB::table('games')->get();
    }
    public static function get_by_diff($difficulty) {
        return DB::table('games')->where('difficulty',$difficulty)->orderBy('final_time','asc')->take(100)->get();
    }
    public static function write($data) {
        return DB::table('games')->insert($data);
    }
}
