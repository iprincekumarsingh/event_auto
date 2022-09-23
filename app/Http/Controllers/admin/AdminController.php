<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Eventreg;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //

    public function index()
    {
        if (session('role') == 0) {
            echo "<h1>Authorised Person Only";
        } else {

            $user = User::where('role', 1)->get();
            $eventTicket = Eventreg::get();

            return view('admin.dashboard', compact('user', 'eventTicket'));
        }
        # code...
    }

    public function usersIndex()
    {
        $user = User::get();
        # code...
        return view('admin.user', compact('user'));
    }
    public function scanner()
    {
        return view('scanner');
        # code...
    }
    public function reserve(Request $request)
    {
        $data = Eventreg::where('payment_id', $request['ticket_number'])->get();
        if ($data->count() == 0) {
            echo 0;
        } else {
            if ($data[0]['entryDone'] == 1) {
                echo "-1";
            } else {
                $entry_count = 0;
                if ($entry_count <= 1) {

                    // $entry_count = $entry_count + $data[0]['entryDone'] + 1;
                    DB::table('eventregs')->where('payment_id', $request['ticket_number'])->update(array('entryDone' => 1));
                    echo 1;
                    // echo $entry_count;
                }
            }
        }
        // echo "1";
        // echo $request['ticket_number'];
    }
    public function foodreserve(Request $req)
    {
        # code...
        $data = Eventreg::where('payment_id', $req['ticket_number'])->get();
        if ($data->count() == 0) {
            echo 0;
        } else {
            if ($data[0]['food'] == 1) {
                echo "-1";
            } else {
                $entry_count = 0;
                if ($entry_count <= 1) {

                    // $entry_count = $entry_count + $data[0]['entryDone'] + 1;
                    DB::table('eventregs')->where('payment_id', $req['ticket_number'])->update(array('food' => 1));
                    echo 1;
                    // echo $entry_count;
                }
            }
        }
    }
    public function foodScanner(Request $request)
    {
        return  view('foodScanner');
    }

    public function errorMsg()
    {
        return view('error');
    }
}
