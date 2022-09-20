<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class EventController extends Controller
{
    //
    public function index()
    {

        $event = Event::get();
        return view('web.event', compact('event'));
    }

    public function single_event($id)
    {
        $event = Event::where('event_id', $id)
            ->get();

        if ($event == null) {
            echo "Event Not found";
        } else {
            return view('web.singleEvent');
        }
    }
    public function bookEvent($event_id)
    {
        
    }
}
