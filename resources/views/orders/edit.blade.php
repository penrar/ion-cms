@extends('layouts.app')

@section('title')
    {{ $order->enterprise_order_number }} :: @parent
@endsection

@section('contact')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-heading">
                <span style="font-size: 1.3em;">{{ $order->enterprise_order_number }}</span>
            </div>
        </div>
        <div class="panel-body">

        </div>
    </div>
@endsection