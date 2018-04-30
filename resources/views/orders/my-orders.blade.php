@extends('layouts.app')

@section('title')
    My Orders :: @parent
@endsection

@section('content')
    <div class="row">
        <div class="page-header">
            <h2>My Orders</h2>
        </div>
    </div>

{{--    {{ dd($orders->first()->enterprise_order_number) }}--}}

    @foreach($orders as $order)
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>
                        {{ $order->enterprise_order_number }}
                        <div class="pull-right">
                            <a class="btn btn-info btn-sm"
                               href="{{ action('OrderController@show', $order->id) }}">View</a>
                        </div>
                    </h4>

                </div>
            </div>

            <div class="panel-body">
                <div class="col-lg-12">
                    <div class="row row-padding">
                        <div class="col-lg-4">
                            <b>Customer:</b>
                            {{ $order->customer->name }}
                        </div>
                    </div>

                    <div class="row row-padding">
                        <div class="col-lg-3">
                            <b>Product:</b> {{ $order->product->name }}
                        </div>

                        <div class="col-lg-3">
                            <b>Order Status:</b> {{ $order->status->status }}
                        </div>
                    </div>



                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <b>Address:</b> {{ $order->property->address }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2">
                                        <b>City:</b> {{ $order->property->city }}
                                    </div>

                                    <div class="col-lg-1">
                                        <b>State:</b> {{ $order->property->state }}
                                    </div>

                                    <div class="col-lg-2">
                                        <b>ZIP:</b> {{ $order->property->zip_code }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- ./col-lg-12 -->
            </div> <!-- ./panel-body -->
        </div ><!-- ./panel -->
    @endforeach
@endsection
