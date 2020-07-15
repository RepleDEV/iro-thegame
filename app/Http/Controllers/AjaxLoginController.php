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
        } elseif (!password_verify($req->passwd, $user_profile->password)){
            return response()->json([
                "err" => "FALSE LOGIN CREDENTIALS"
            ],200);
        } elseif ($req->email != $user_profile->email) {
            return response()->json([
                "err" => "FALSE LOGIN CREDENTIALS"
            ],200);
        }
        return response()->json(["msg"=>"LOGGED IN"],200);
    }
    public function signup(Request $req) {
        UsersModel::new_user([
            "username"=>$req->username,
            "email"=>$req->email,
            "password"=>password_hash($req->passwd,PASSWORD_DEFAULT),
            "created_at"=>Carbon::now()->toDateTimeString()
        ]);
    }
}
