<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;


class UsersModel {
    public static function get_user($username) {
        return DB::table('users')->where('username', $username)->first();
    }
    public static function new_user($data) {
        DB::table('users')->insert($data);
    }
}
