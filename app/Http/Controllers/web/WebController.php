<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Mail\TicketGeneartionMail;
use App\Models\Event;
use App\Models\Eventreg;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class WebController extends Controller
{
    public function homePage()
    {
        $event = Event::get();
        return view('welcome', compact('event'));
        # code...
    }
    public function eventSingle($eventName, $id)
    {
        $event = Event::where('event_id', $id)->get();
        // echo "<pre>";
        return view('event', compact('event'));
    }
    public function dashboard()
    {
        echo "Login Successfull";
    }
    public function userDashboard()
    {
        $event = DB::table('events')
            ->join('eventregs', 'events.event_id', '=', 'eventregs.event_id')
            ->join('users', 'users.id', '=', 'eventregs.uid')
            // ->select('users.name', 'contacts.phone', 'orders.price')
            ->where('users.id', 1)
            ->get();
        // echo "<pre>";
        // echo $users;
        return view('dashboard.user', compact('event'));
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

        session()->put('eventcode', $request['eventcode']);
        $api = new Api("rzp_test_HypEZq4yiwaOUL", "il3Hxs8BvwfxWwKdC1FZ8ibe");

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
        $evenData = Event::where('event_id', session('eventcode'))->get();
        $uid = session('uid');
        // dd($response);
        $event = new Eventreg;
        $event->event_id = session('eventcode');
        $event->uid = session('uid');
        $event->amount = $evenData[0]['amount'];
        $event->payment_done = true;
        $event->payment_id = $request['razorpay_payment_id'];
        $event->save();
        session()->put('paymentid', $request['razorpay_payment_id']);
        $time = time();

        // create a folder
        if (!\File::exists(public_path('images'))) {
            \File::makeDirectory(public_path('images'), $mode = 0777, true, true);
        }

        QrCode::generate(session('payemntid'), 'images/' . $time . '.svg');

        $img_url = 'images/' . $time . '.svg';

        session()->put('qrImage', $img_url);
        Mail::to(session('email'))->send(new TicketGeneartionMail());
        // Session::put('success', 'Payment successful');
        // return redirect()->back();

    }
    public function thankyou()
    {
        return view('thankyou');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
        # code...
    }
}
