@extends('layouts.raffle')

@section('content')
<div class="container">
    <h1>You currently have <span style="color: #fd5c63">{{Auth::user()->tickets}}</span> tickets</h1>
    <p>All transactions are authorized by paypal.</p>
    <div class="pricing">
        <div class="ticket">
            <div class="ticket-heading">10 tickets</div>
            <div class="ticket-price">20.00$</div>
            <div class="ticket-bottom"><a href="{{route('buy', 10)}}"><button>Purchase tickets</button></a></div>
        </div>
        <div class="ticket">
            <div class="ticket-heading">25 tickets</div>
            <div class="ticket-price">40.00$</div>
            <div class="ticket-bottom"><a href="{{route('buy', 25)}}"><button>Purchase tickets</button></a></div>
        </div>
        <div class="ticket">
            <div class="ticket-heading">50 tickets</div>
            <div class="ticket-price">75.00$</div>
            <div class="ticket-bottom"><a href="{{route('buy', 50)}}"><button>Purchase tickets</button></a></div>
        </div>
        <div class="ticket">
            <div class="ticket-heading">100 tickets</div>
            <div class="ticket-price">100.00$</div>
            <div class="ticket-bottom"><a href="{{route('buy', 100)}}"><button>Purchase tickets</button></a></div>
        </div>
    </div>
</div>
@endsection
