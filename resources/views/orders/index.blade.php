@extends('layouts.app')
{{-- Web site Title --}}
@section('title')
    Orders :: @parent
@endsection

@section('content')
    <h3>Orders</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                Search
            </h3>
        </div>
        <div class="panel-body">

        </div>
    </div>

    @foreach($orders as $order)
        @include('orders.partials._card')
    @endforeach
@endsection
