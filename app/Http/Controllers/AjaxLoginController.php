<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UsersModel;

class AjaxLoginController extends Controller
{
    public function login(Request $req) {
        $user_profile = UsersModel::get_user($req->username);
        if (!$user_profile) {
            return response()->json([
                "err" => "FALSE LOGIN CREDENTIALS"
            ],200);
        }
        return response()->json(["msg"=>"AJAX WORKED"],200);
    }
}
