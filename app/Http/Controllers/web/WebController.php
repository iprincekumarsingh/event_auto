<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Mail\TicketGeneartionMail;
use App\Models\Event;
use App\Models\Eventreg;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\AddName;
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
            ->where('users.id', session('uid'))
            ->get();
        // echo "<pre>";
        // echo $event;
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
        $api = new Api("rzp_test_6ezF7HXzvyJKB5", "x7iCwmMhD99vdUU7vywVbMcd");

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        // $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
            } catch (Exception $e) {
                return  $e->getMessage();
                session()->put('error', $e->getMessage());
                return redirect()->back();
            }
        }
        $evenData = Event::where('event_id', session('eventcode'))->get();
        $uid = session('uid');
        $time = time();
         // create a folder
         if (!\File::exists(public_path('images'))) {
            \File::makeDirectory(public_path('images'), $mode = 0777, true, true);
        }


        // dd($response);
        $event = new Eventreg;
        $event->event_id = session('eventcode');
        $event->uid = 0;
        $event->amount =$request['tamount'];
        $event->payment_done = true;
        $event->name=$request['name'];
        $event->email=$request['email2'];
        $event->phone = $request['phone'];
        $event->contact = $request['phone'];
        $event->address =$request['address'];
        $event->payment_id = $request['razorpay_payment_id'];

        session()->put('paymentid', $request['razorpay_payment_id']);
        QrCode::generate(session('paymentid'), 'images/' . $time . '.svg');

        $img_url = 'images/' . $time . '.svg';

    //   QrCode::size(500)->format('png')->generate(session('paymentid'), 'images/' . $time . '.png');

        // QrCode::format('png')
        // $img_url = 'images/' . $time . '.png';
        session()->put('qrImage', $img_url);
        $event->qr_code=session('qrImage');
        session()->put('name',$request['name']);

        $event->save();


        Mail::to($request['email2'])->send(new TicketGeneartionMail());
        // Session::put('success', 'Payment successful');
        // return redirect('th');
        // echo $request['email2']
          if ($request['ticket_count'] > 1) {
            return view('form');
        } else {
            return redirect('/th');
        }

    }
    public function addName(Request $request)
    {


        $he = $request->all();
        //    return $he;
        //    echo $request['count'];
        $count = $request['count'];
        // echo $count;
        for ($i = 1; $i < $count; $i++) {
            echo $request['name' . $i];
            $data = new AddName;
            $data->payment_id = $request['payment_id'];
            $data->name = $request['name'.$i];
            $data->count = $request['count'];
            $data->save();
            // echo $i;
        }
          return redirect('/th');
    }
    public function pay(Request $request)
    {
        echo "<pre>";
        $data = $request->all();
        // foreach ($data as $key => $hello) {
        //     # code...
        //     // echo "<pre>";
        //     // echo $hello;
        // }
        return view('pay');
        # code...
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
    //   public function contact()
    // {
    //     return view('web.contact');
    // }
     public function contact()
    {
        return view('web.contact');
    }
    public function contactSend(Request $req)
    {
        session()->put('title',$req['title']);
        session()->put('emailcontact',$req['emailcontact']);
        session()->put('phoneCon',$req['phoneCon']);
        session()->put('query',$req['query']);
        Mail::to("support@divyasrishtievents.in")->send(new ContactUs());
        return back();
    }
     // General Link
    public function termsCondtions()
    {
        # code...
        return view('web.termscondtions');
    }
    public function RefundCancellation()
    {
        return view('web.refundCancellation');
        # code...
    }
    public function privacyPolicy()
    {
        return view('web.privacy-policy');
        # code...
    }
}
