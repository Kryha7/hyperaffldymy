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
                <a href="{{route('raffle.index')}}" class="btn btn-default">All raffles</a>
            </div>
        <div class="row">
            {!! Form::open(
                array(
                    'route' => 'raffle.store',
                    'class' => 'form',
                    'novalidate' => 'novalidate',
                    'files' => true
                ))
            !!}

                <div class="form-group">
                    {!! Form::label('Brand') !!}
                    {!! Form::text('brand') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Title') !!}
                    {!! Form::text('title') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Raffle image') !!}
                    {!! Form::file('image', null) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Max tickets') !!}
                    {!! Form::number('max_tickets') !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Create raffle') !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection