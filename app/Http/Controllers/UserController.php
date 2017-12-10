<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tickets()
    {
        return view('user.tickets');
    }

    public function buy(Request $request, $amount)
    {
        $user = $request->user();
        $user->tickets = $user->tickets += $amount;

        $user->save();

        return back();
    }
}
