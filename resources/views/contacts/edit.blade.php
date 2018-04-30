@extends('layouts.app')

@section('content')
    <div class="col-lg-6">
        {!! Form::model($contact, ['method' => 'PATCH', 'action' => ['ContactController@update', $order->id]]) !!}
        @include('contacts.partials._form')
        {!! Form::close() !!}
    </div>
@endsection