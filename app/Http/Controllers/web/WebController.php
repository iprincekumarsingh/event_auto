<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Eventreg;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;

class WebController extends Controller
{

    public function dashboard()
    {
        echo "Login Successfull";
    }
    public function paytest(Request $request)
    {

        $event = Event::where('event_id', $request['event_id'])->get();
        // echo $event;
        session()->put('event_id', $request['event_id']);
        // echo session('event_id');
        return view('pay', compact('event'));
    }
    public function store(Request $request)
    {
        $input = $request->all();

        $api = new Api("rzp_live_uHrDPumBAZOWYB", "sE0NQfSU5VpTiX3OeT0GmGbd");

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        // $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error', $e->getMessage());
                // return redirect()->back();
            }
        }
        $evenData = Event::where('event_id',session('event_id'))->get();
        $uid = session('uid');
        // dd($response);
        $event = new Eventreg;
        $event->event_id = session('event_id');
        $event->uid=session('uid');
        $event->amount=$evenData[0]['amount'];
        $event->payment_done = true;
        $event->payment_id = $request['razorpay_payment_id'];
        $event->save();
        // Session::put('success', 'Payment successful');
        // return redirect()->back();
    }
}
