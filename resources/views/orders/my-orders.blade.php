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

    @foreach($orders as $order)
        @include('orders.partials._card')
    @endforeach
@endsection
