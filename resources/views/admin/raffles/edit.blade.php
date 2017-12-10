@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
            <div class="row">
                <a href="{{url('/admin/raffle/create')}}" class="btn btn-success">Create raffle</a>
                <a href="{{url('/admin/raffles')}}" class="btn btn-default">All raffles</a>
            </div>
        <div class="row">
                {!! Form::open(
                   array(
                       'route' => ['raffle.update', $raffle],
                       'class' => 'form',
                       'novalidate' => 'novalidate',
                       'files' => true
                   ))
                !!}
                    <div class="form-group">
                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                        <label for="title">Brand</label>
                        <input type="text" class="form-control" name="brand" value="{{$raffle->brand}}" />
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$raffle->title}}" />
                    </div>
                    <div class="form-group">
                        {!! Form::label('Upload extension image') !!}
                        {!! Form::file('image[]', ['multiple' => 'multiple']); !!}
                    </div>
                    <div class="form-group">
                        <label for="max_tickets">Max tickets</label>
                        <input type="number" class="form-control" name="max_tickets" value="{{$raffle->max_tickets}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                {!! Form::close() !!}
        </div>
    </div>
@endsection