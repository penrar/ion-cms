@extends('layouts.app')

@section('title')
    {{ $order->enterprise_order_number  }} :: @parent
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <span style="font-size: 1.3em;">{{ $order->enterprise_order_number }}</span>
                <div class="pull-right">
                    <a  href="{{ action('OrderController@edit', ['order' => $order->id]) }}"
                        class="btn btn-sm btn-info">
                        Update Order Status
                    </a>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <div class="col-lg-12">

                <div class="row">
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
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Customer Information
                                <span class="pull-right">
                                    <a href="{{ action('ContactController@edit', ['order' => $order->id])}}"
                                       class="btn btn-xs btn-info">
                                        Update Contact Information
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row row-padding">
                                <div class="col-lg-4">
                                    <b>Customer:</b>
                                    {{ $order->customer->name }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Property Information
                                <div class="pull-right">
                                    <a class="btn btn-info btn-xs"
                                       href="{{ action('PropertyController@edit', [$order->id, $order->property->id]) }}">Update Property Information</a>
                                </div>
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
                </div>

                <div class="row row-padding">
                    <div class="col-lg-4">
                        <b>Borrowers:</b>
                        @foreach($order->borrowers as $borrower)
                            {{ $borrower->name }} <br>
                        @endforeach
                    </div>
                </div>

                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Actions
                            </div>
                        </div>
                        <div class="panel-body">
                            @if($order->actions->count() > 0)
                                @foreach($order->actions as $action)
                                    <div class="row">
                                        <div class="col-lg-2">
                                            {{ $action->user->name }}
                                        </div>
                                        <div class="col-lg-2">
                                            {{ $action->type }}
                                        </div>
                                        <div class="col-lg-8">
                                            {{ $action->notes }}
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                No actions!
                            @endif
                        </div>
                    </div>
                </div>


            </div> <!-- ./col-lg-12 -->
        </div> <!-- ./panel-body -->
    </div ><!-- ./panel -->
@endsection