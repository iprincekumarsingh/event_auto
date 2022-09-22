<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Mail\AccountCreationMail;
use App\Mail\DemoMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    //

    public function index_login()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request['email'])
            ->where('password', $request['password'])
            ->get();

        if ($user->count() == 0) {
            return back()->with('error', 'Incorrect Username/Password');
        } else {
            session()->put('isLoggedIn', 1);
            session()->put('email', $user[0]['email']);
            session()->put('role', $user[0]['role']);
        }
        return redirect('/');
    }

    public function signup()
    {
        return view('auth.register');
    }
    public function create_acocunt(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            // 'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required'
            // 'username'=>'required|unique:users,username',
            // 'phone'=>'required',
        ]);
        $user = User::where('email', $request['email'])->first();
        if ($user == null) {
            $user2 = new User;
            $user2->name = $request['name'];
            $user2->email = $request['email'];
            // $user2->phone = $request['phone'];
            // $user2->username = $request['username'];
            $user2->password = $request['password'];
            $user2->save();

            $user3 = User::where('email', $request['email'])->get();
            session()->put('isLoggedIn', 1);
            session()->put('uid', $user3[0]['id']);
            session()->put('name', $request['name']);
            session()->put('email', $request['email']);
            // session()->put('phone',$request['phone']);
            session()->put('pass', $request['password']);
            Mail::to($request['email'])->send(new AccountCreationMail());
            // session()->forget('na me');
            session()->forget('pass');

            echo 1;
        } else {
            echo "Account Already Exist";
        }
        return redirect('/');
    }
}
