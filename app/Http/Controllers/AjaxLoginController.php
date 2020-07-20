<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\UsersModel;

class AjaxLoginController extends Controller
{
    public function login(Request $req) {
        $user_profile = UsersModel::get_user($req->username);
        if (count((array)$user_profile) <= 0) {
            return response()->json([
                "err" => "FALSE LOGIN CREDENTIALS"
            ],200);
        } elseif (!password_verify($req->password, $user_profile->password)){
            return response()->json([
                "err" => "FALSE LOGIN CREDENTIALS"
            ],200);
        }
        return redirect()->route('login');
    }
}
