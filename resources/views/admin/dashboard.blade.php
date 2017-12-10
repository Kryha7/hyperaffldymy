@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Admin dashboard |
                        <a href="{{route('raffle.index')}}">Raffles</a> |
                        <a href="{{route('ttransactions.index')}}">Tickets transactions</a> |
                        <a href="">Transactions</a>

                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <ul>
                            <li>All raffles {{$raffles['all_raffles']}}</li>
                            <li>Active raffles {{$raffles['active_raffles']}}</li>
                            <li>Ended raffles {{$raffles['ended_raffles']}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
