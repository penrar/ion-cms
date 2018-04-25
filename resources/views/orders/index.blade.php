@extends('layouts.app')

@section('title')
    Orders :: @parent
@endsection

@section('content')
    <div class="row">
        <div class="page-header">
            <h2>Orders</h2>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                Search
            </h3>
        </div>
        <div class="panel-body">
            {!! Form::open(['action' => 'OrderController@search', 'class' => 'form-horizontal']) !!}
                @include('orders.partials._searchForm')
            {!! Form::close() !!}
        </div>
    </div>

    @foreach($orders as $order)
        @include('orders.partials._card')
    @endforeach

@endsection
