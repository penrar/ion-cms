@extends('layouts.app')

@section('title')
    {{ $order->enterprise_order_number }} :: @parent
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-heading">
                <span style="font-size: 1.3em;">{{ $order->enterprise_order_number }}</span>
                <span class="pull-right">
                    <a href="{{ action('OrderController@show', [$order->id]) }}"
                       class="btn btn-info"  >
                        Return to the order
                    </a>
                </span>
            </div>
        </div>
        <div class="panel-body">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        Order Information
                    </div>
                </div>
                <div class="panel-body">

                    <div class="row row-padding">
                        <div class="col-lg-3">
                            <b>Product:</b> {{ $order->product->name }}
                        </div>

                        <div class="col-lg-3">
                            <b>Order Status:</b> {{ $order->status->status }}
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Property Information
                            </div>
                        </div>
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


                    <div class="row">
                        <div class="col-lg-4">

                        </div>
                        <div class="col-lg-4">

                        </div>
                        <div class="col-lg-4">

                        </div>
                    </div>
                </div>
            </div> <!-- /order info panel -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        Update Order Status
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12">
                        {!! Form::model($order, ['method' => 'PATCH', 'action' => ['OrderController@update', $order->id]]) !!}
                        @include('orders.partials._form')
                        {!! Form::close() !!}
                    </div>
                </div> <!-- /customer info panel -->
            </div> <!-- /order info panel -->

        </div> <!-- / panel-body -->

    </div>
@endsection