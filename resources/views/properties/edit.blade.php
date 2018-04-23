@extends('layouts.app')

@section('content')
    <div class="col-lg-6">
        {!! Form::model($property, ['method' => 'PATCH', 'action' => ['PropertyController@update', $order->id]]) !!}
            @include('properties.partials._form')
        {!! Form::close() !!}
    </div>
@endsection