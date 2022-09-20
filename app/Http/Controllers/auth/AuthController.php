<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function index_login()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = User::where('username', $request['username'])
            ->where('password', $request['password'])
            ->get();

        if ($user == null) {
            return 0;
        } else {
            session()->put('isLoggedIn', 1);
            if ($user[0]['role'] == 0) {
                session()->put('role', '0');
            } elseif ($user[0]['role'] == 1) {
                session()->put('role', 1);
            }
            session()->put('uid', $user[0]['id']);
            echo session('uid');
            return back();
        }
    }

    public function create_acocunt(Request $request)
    {
        $user = User::where('username', $request['username'])->first();
        if ($user == null) {
            $user2 = new User;
            $user2->name = $request['name'];
            $user2->email = $request['email'];
            $user2->phone = $request['phone'];
            $user2->username = $request['username'];
            $user2->password = $request['password'];
            $user2->save();
            $user3 = User::where('username', $request['username'])->get();
            session()->put('isLoggedIn', 1);
            session()->put('uid', $user[0]['id']);
            return redirect('/home');
            echo 1;
        } else {
            echo "Account Already Exist";
        }
    }
}