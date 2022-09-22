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
        $user = User::where('role',1)->get();
        $eventTicket = Eventreg::get();

        return view('admin.dashboard',compact('user','eventTicket'));
        # code...
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
            if ($data[0]['entry_done'] == 1) {
                echo "-1";
            } else {
                DB::table('eventregs')->where('payment_id', $request['ticket_number'])->update(array('entry_done' => 1));
                echo 1;
            }
        }
    }
}
