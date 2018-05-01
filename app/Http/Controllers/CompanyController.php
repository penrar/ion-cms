<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $contact = $order->customer->customerable;
        return view('companies.edit', compact('order', 'contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CompanyRequest $request, Order $order)
    {
        $customer = Customer::findOrFail($order->customer->id);
        $customer->customerable()->update($request->all());
        return redirect()->route('order.show', [$order->id])->with('success', 'Company updated!');
    }
}
