<?php

namespace App\Http\Controllers;

use App\Payments;
use App\Raffle;
use App\TicketsTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

            $winnings = Raffle::where('winner', $user->id)->count();
            $tickets = TicketsTransactions::where('user_id', $user->id)->count();
//            $payments = Payments::where('user_id', $user->id)->count();
            $payments = 0;

        return view('user.profile', compact('winnings', 'tickets', 'payments'));
    }
}
