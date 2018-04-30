@extends('layouts.app')

@section('content')
    <div class="col-lg-6">
        {!! Form::model($contact, ['method' => 'PATCH', 'action' => ['CompanyController@update', $order->id]]) !!}
        @include('companies.partials._form')
        {!! Form::close() !!}
    </div>
@endsection