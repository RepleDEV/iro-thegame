<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class UsersModel {
    public static function update_by_id($id, $column, $data) {
        DB::table('users')->where('id', $id)->update([$column => $data]);
    }
    public static function get_by_id($id) {
        return DB::table('users')->where('id', $id)->first();
    }
}
