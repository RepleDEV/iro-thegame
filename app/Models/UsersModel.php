<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class UsersModel {
    public static function get_user($username) {
        return DB::table('users')->where('username', $username)->first();
    }
}
