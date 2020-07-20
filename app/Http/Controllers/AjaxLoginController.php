<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\UsersModel;

class AjaxLoginController extends Controller
{
    public function login(Request $req) {
        $user_profile = UsersModel::get_user($req->username);
        // return response()->json([
        //     "err" => password_verify($req->passwd, $user_profile->password)
        // ],200);
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
        return redirect('/login');
    }
}
