<?php

namespace App\Http\Controllers;

use App\Raffle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $this->middleware('roles');

        $raffles = array(
            'all_raffles' => Raffle::count(),
            'active_raffles' => Raffle::where('active', 1)->count(),
            'ended_raffles' => Raffle::where('active', 0)->count()
        );

        return view('admin.dashboard', ['raffles' => $raffles]);
    }
}
