<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Property, App\Order;

class PropertyController extends Controller
{
    /**
     * Displays the edit view for properties
     * @param Request $request
     * @param Order $order
     * @param Property $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $property = $order->property;
        return view('properties.edit', compact('property', 'order'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->property()->update($request->all());
        return redirect()->route('order.show', [$order->id])->with('success', 'Property updated!');
    }
}