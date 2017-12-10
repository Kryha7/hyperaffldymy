@extends('layouts.beast')

@section('content')
    <div class="container">
        <h1>Raffles</h1>
            <div class="raffles">
                @foreach($raffles as $raffle)
                   <div class="raffle">
                       <div class="raffle-img">
                           <a href="{{ URL::asset('images/'.$raffle->id).'/'.$raffle->thumb.'.jpg' }}" data-lightbox="image{{$raffle->id}}" data-title="{{$raffle->brand}} {{$raffle->title}}" data-alt="{{$raffle->brand}} {{$raffle->title}}">
                               <img src="{{ URL::asset('images/'.$raffle->id).'/'.$raffle->thumb.'.jpg' }}" alt="{{$raffle->brand}} {{$raffle->title}}">
                           </a>
                           <a hidden href="{{ URL::asset('images/'.$raffle->id).'/'.($raffle->thumb+1).'.jpg' }}" data-lightbox="image{{$raffle->id}}" data-title="{{$raffle->brand}} {{$raffle->title}}" data-alt="{{$raffle->brand}} {{$raffle->title}}">
                               <img src="{{ URL::asset('images/'.$raffle->id).'/'.($raffle->thumb+1).'.jpg' }}" alt="{{$raffle->brand}} {{$raffle->title}}">
                           </a>
                           <a hidden href="{{ URL::asset('images/'.$raffle->id).'/'.($raffle->thumb+2).'.jpg' }}" data-lightbox="image{{$raffle->id}}" data-title="{{$raffle->brand}} {{$raffle->title}}" data-alt="{{$raffle->brand}} {{$raffle->title}}">
                               <img src="{{ URL::asset('images/'.$raffle->id).'/'.($raffle->thumb+2).'.jpg' }}" alt="{{$raffle->brand}} {{$raffle->title}}">
                           </a>
                       </div>
                       <div class="raffle-title">
                           <div class="raffle-brand">{{$raffle->brand}}</div>
                           <div class="raffle-name">{{$raffle->title}}</div>
                       </div>
                       @if($raffle->tickets == 0)
                           <div class="raffle-amount">0 / <span style="color: #fd5c63">{{$raffle->max_tickets}}</span> TICKETS</div>
                       @else
                           <div class="raffle-amount">{{$raffle->tickets}} / <span style="color: #fd5c63">{{$raffle->max_tickets}}</span> TICKETS</div>
                       @endif

                       <div class="tickets-form">
                           @guest
                               @else
                                   @if($raffle->tickets != $raffle->max_tickets)
                                       <button class="{{$raffle->id}} btn-add-tickets">Add tickets</button>
                                   @else
                                       <div class="tickets-form"><p class="raffle-closed-text">Raffle closed</p></div>
                                   @endif
                                   @endguest
                       </div>

                       <div id="{{$raffle->id}}" class="pignose-popup">
                           <div class="item_header">
                               <span class="txt_title" style="text-transform: uppercase">{{$raffle->brand}} {{$raffle->title}}</span>
                               <a href="#" class="btn_close">Close</a>
                           </div>
                           <div class="item_content">
                                   @guest
                                       @else
                                          <h2>You currently have <span style="color:#fd5c63;">{{Auth::user()->tickets}}</span> tickets</h2>
                                           @if($raffle->tickets != $raffle->max_tickets)
                                               {!! Form::open(['route' => 'tickets.put', 'method' => 'post']) !!}
                                               <input type="hidden" name="raffle_id" value="{{$raffle->id}}">
                                               <input type="hidden" name="max_tickets" value="{{$raffle->max_tickets}}">
                                               <input type="number" class="form-add-tickets" name="tickets">
                                               <button type="submit" class="btn-add-tickets2">Add</button>
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
                   </div>
                @endforeach
            </div>
    </div>
@endsection
