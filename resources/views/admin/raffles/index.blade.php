@extends('layouts.app')

@section('content')
    <div class="container">
        @if(\Session::has('success'))
            <div class="alert alert-success">
                {{\Session::get('route')}}
            </div>
        @endif
            @if(\Session::has('winner'))
                <h1 class="text-center">{{\Session::get('winner')['name']}}</h1>
                <h2 class="text-center">{{\Session::get('winner')['email']}}</h2>
            @endif
            <div class="row">
            <a href="{{route('raffle.create')}}" class="btn btn-success">Create raffle</a>
            <a href="{{route('raffle.index')}}" class="btn btn-default">All raffles</a>
                <a href="{{route('ttransactions.index')}}" class="btn btn-default">All tickets transactions</a>
            </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <td class="text-center">ID</td>
                <td>Brand</td>
                <td>Title</td>
                <td class="text-center">Max tickets</td>
                <td class="text-center">Tickets</td>
                <td class="text-center">Winner</td>
                <td class="text-center">Active</td>
                <td colspan="3"></td>
            </tr>
            </thead>
            <tbody>
            @foreach($raffles as $raffle)
                <tr>
                    <td class="text-center">{{$raffle->id}}</td>
                    <td>{{$raffle->brand}}</td>
                    <td>{{$raffle->title}}</td>
                    <td class="text-center">{{$raffle->max_tickets}}</td>
                    <td class="text-center">{{$raffle->tickets}}</td>
                    @if($raffle->winner == null)
                        <td class="text-center">Not yet</td>
                    @else
                        <td class="text-center">{{$raffle->winner}}</td>
                    @endif
                    <td class="text-center">
                        @if($raffle->active == 1)
                            Yes
                        @else
                            No
                        @endif
                    </td>
                    @if($raffle->max_tickets == $raffle->tickets && $raffle->active == 1)
                        <td><a href="{{route('raffle.raffle', $raffle)}}"><button class="btn btn-warning">Raffle</button></a></td>
                    @else
                        <td><a href="{{route('raffle.show_winner', $raffle)}}"><button class="btn btn-warning">Show winner data</button></a></td>
                    @endif
                    <td><a href="{{route('raffle.edit', $raffle)}}"><button class="btn btn-primary">Edit</button></a></td>
                    <td><a href="{{route('raffle.delete', $raffle)}}"><button class="btn btn-danger">Delete</button></a></td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection