@extends('layouts.app')

@section('content')
    <div class="container">
        @if(\Session::has('success'))
            <div class="alert alert-success">
                {{\Session::get('route')}}
            </div>
        @endif
            <div class="row"><a href="{{route('raffle.index')}}" class="btn btn-default">Raffles</a>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <td class="text-center">ID</td>
                <td class="text-center">Raffle ID</td>
                <td class="text-center">User ID</td>
                <td class="text-center">Amount</td>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td class="text-center">{{$transaction->id}}</td>
                    <td class="text-center">{{$transaction->raffle_id}}</td>
                    <td class="text-center">{{$transaction->user_id}}</td>
                    <td class="text-center">{{$transaction->amount}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection