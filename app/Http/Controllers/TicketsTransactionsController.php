<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TicketsTransactions;

class TicketsTransactionsController extends Controller
{
    public function index()
    {
        $transactions = TicketsTransactions::all();
        return view('admin.tickets_transactions.index', compact('transactions'));
    }
}
