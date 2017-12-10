@extends('layouts.beast')
@section('content')
    <div class="raffles">
        <h1>Raffles</h1>
        @foreach($raffles as $raffle)
            <div class="raffle">
                <div class="raffle-images">
                    <a href="{{ URL::asset('images/'.$raffle->id).'/'.$raffle->thumb.'.jpg' }}" data-lightbox="image{{$raffle->id}}" data-title="{{$raffle->brand}} {{$raffle->title}}" data-alt="{{$raffle->brand}} {{$raffle->title}}">
                        <img src="{{ URL::asset('images/'.$raffle->id).'/'.$raffle->thumb.'.jpg' }}" alt="{{$raffle->brand}} {{$raffle->title}}" width="300px">
                    </a>
                    <a hidden href="{{ URL::asset('images/'.$raffle->id).'/'.($raffle->thumb+1).'.jpg' }}" data-lightbox="image{{$raffle->id}}" data-title="{{$raffle->brand}} {{$raffle->title}}" data-alt="{{$raffle->brand}} {{$raffle->title}}">
                        <img src="{{ URL::asset('images/'.$raffle->id).'/'.($raffle->thumb+1).'.jpg' }}" alt="{{$raffle->brand}} {{$raffle->title}}">
                    </a>
                    <a hidden href="{{ URL::asset('images/'.$raffle->id).'/'.($raffle->thumb+2).'.jpg' }}" data-lightbox="image{{$raffle->id}}" data-title="{{$raffle->brand}} {{$raffle->title}}" data-alt="{{$raffle->brand}} {{$raffle->title}}">
                        <img src="{{ URL::asset('images/'.$raffle->id).'/'.($raffle->thumb+2).'.jpg' }}" alt="{{$raffle->brand}} {{$raffle->title}}">
                    </a>
                </div>
                <div class="raffle-brand">{{$raffle->brand}}</div>
                <div class="raffle-title">{{$raffle->title}}</div>
                <div class="raffle-tickets">
                    @if($raffle->tickets == 0)
                        <span style="color: #fd5c63">0</span>/{{$raffle->max_tickets}} Tickets
                    @else
                        <span style="color: #fd5c63">{{$raffle->tickets}}</span>/{{$raffle->max_tickets}} Tickets
                    @endif
                </div>
                <div class="raffle-button">
                    @if($raffle->tickets == $raffle->max_tickets)
                        <button disabled>Raffle closed</button>
                    @else
                        <button class="{{$raffle->id}}">Take in raffle</button>
                    @endif
                </div>
            </div>
            <div id="{{$raffle->id}}" class="pignose-popup">
                <div class="item_header">
                    <span class="txt_title" style="text-transform: uppercase">{{$raffle->brand}} {{$raffle->title}}</span>
                    <a href="#" class="btn_close"><img src="images/icon_close.gif" alt="close modal" /></a>
                </div>
                <div class="item_content">
                    @guest
                        <h2>Login with Facebook to take in raffle.</h2>
                        @else
                            <h2>You currently have <span style="color:#fd5c63;">{{Auth::user()->tickets}}</span> tickets</h2>
                            @if($raffle->tickets != $raffle->max_tickets)
                                {!! Form::open(['route' => 'tickets.put', 'method' => 'post']) !!}
                                <input type="hidden" name="raffle_id" value="{{$raffle->id}}">
                                <input type="hidden" name="max_tickets" value="{{$raffle->max_tickets}}">
                                <input type="number" name="tickets">
                                <button type="submit">Add tickets</button>
                                {!! Form::close() !!}
                            @endif
                            @endguest
                </div>
            </div>
            <script>
                $('.{{$raffle->id}}').bind('click', function(event) {
                    event.preventDefault();
                    $('#{{$raffle->id}}').pignosePopup();
                });
            </script>
        @endforeach
    </div>
@endsection