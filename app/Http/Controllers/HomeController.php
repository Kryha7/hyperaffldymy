<?php

namespace App\Http\Controllers;

use App\Http\Requests\PutTicketsRequest;
use App\Raffle;
use App\TicketsTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raffles = Raffle::where('active', 1)->get();

        return view('index', compact('raffles'));
    }

    public function put_tickets(PutTicketsRequest $request)
    {
        $user = $request->user();
         if ($user->tickets >= $request->tickets && $user->tickets > 0)
         {
             $raffle = Raffle::where('id', $request->raffle_id)->first();
             $maxtickets2 = $request->max_tickets - $raffle->tickets;

             if ($maxtickets2 >= $request->tickets)
             {
                 $user->tickets = $user->tickets - $request->tickets;
                 $user->save();

                 $raffle->tickets = $raffle->tickets + $request->tickets;
                 $raffle->save();

                 $transaction = new TicketsTransactions();

                 $transaction->raffle_id = $request->raffle_id;
                 $transaction->user_id = $user->id;
                 $transaction->amount = $request->tickets;
                 $transaction->save();

                 Session::flash('success', "xyz");
                 return redirect()->route('index');
             }else{
                 Session::flash('closed', "xyz");
                 return redirect()->route('index');
             }
         }else{
             Session::flash('tickets', "xyz");
             return redirect()->route('index');
         }
    }

    public function help()
    {
        return view('help');
    }
}
