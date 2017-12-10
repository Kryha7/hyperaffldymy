<?php

namespace App\Http\Controllers;

use App\Http\Requests\RafflesRequest;
use App\Raffle;
use App\User;
use App\TicketsTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RaffleController extends Controller
{
    public function index()
    {
        $raffles = Raffle::all();
        return view('admin.raffles.index', compact('raffles'));
    }

    public function create()
    {
        return view('admin.raffles.create');
    }

    public function edit(Raffle $raffle)
    {
        return view('admin.raffles.edit', compact('raffle'));
    }

    public function store(RafflesRequest $request)
    {
        $raffle = new Raffle();
        $raffle->brand = $request->input('brand');
        $raffle->title = $request->input('title');
        $raffle->max_tickets = $request->input('max_tickets');
        $raffle->active = 1;
        $raffle->save();

        $path = base_path().'/public/images/'.$raffle->id;
        mkdir($path, 0777);

        $image_name = $raffle->id.'.'.$request->file('image')->getClientOriginalExtension();
        $image_ext = $request->file('image')->getClientOriginalExtension();

        $image = $image_name.'.'.$image_ext;

        $raffle->thumb = $image;
        $raffle->save();

        $request->file('image')->move($path, $image_name);

        return redirect()->route('raffle.index');
    }

    public function update(RafflesRequest $request, Raffle $raffle)
    {
        $raffle->update($request->all());

        $path = base_path().'/public/images/'.$raffle->id;
        $count = count($request->image);
        $ext = 1;

        for ($int = 0; $int < $count; $int++)
        {
            $image = $request->image[$int];

            $image_name = ($raffle->id+$ext).'.'.$image->getClientOriginalExtension();
            $image->move($path, $image_name);
            $ext++;
        }

        return redirect()->route('raffle.index');
    }

    public function delete(Raffle $raffle)
    {
        $raffle->delete();
        return redirect()->route('raffle.index');
    }

    public function raffle(Raffle $raffle)
    {
        if ($raffle->active == 1)
        {
            $transactions = TicketsTransactions::where('raffle_id', $raffle->id)->get();
            $basket = array();

            foreach ($transactions as $transaction)
            {
                for ($i = 0; $i < $transaction->amount; $i++)
                {
                    array_push($basket, $transaction->user_id);
                }
            }

            $winner = $basket[rand(0, $raffle->max_tickets-1)];

            $raffle->winner = $winner;
            $raffle->active = 0;
            $raffle->save();

            return redirect()->route('raffle.show_winner', $raffle);
        }
        else
        {
            return back();
        }
    }

    public function show_winner(Raffle $raffle)
    {
        $user = User::where('id', $raffle->winner)->first();

        return back()->with('winner', $user);
    }
}
