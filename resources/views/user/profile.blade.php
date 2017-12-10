@extends('layouts.raffle')

@section('content')
<div class="container">
    <h1>{{ Auth::user()->name }}</h1>
    <h2>Your winnings <span style="color: #fd5c63">{{$winnings}}</span></h2>
    <h2>Taken in a raffles <span style="color: #fd5c63">{{$tickets}}</span></h2>
    <h2>Payment transactions <span style="color: #fd5c63">{{$payments}}</span></h2>
</div>
@endsection
