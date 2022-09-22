<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Eventreg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //

    public function index()
    {
        return view('admin.dashboard');
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
