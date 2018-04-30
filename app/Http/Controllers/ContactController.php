<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contact;
use App\Customer;
use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {

        $customerable = $order->customer->customerable;
        $contact = null;

        if($customerable instanceof Contact) {
            $contact = $customerable;
        } else if($customerable instanceof Company) {
            $contact = $customerable;
            return view('companies.edit', compact('order', 'contact'));
        } else {
            throw new \Error('Invalid Customerable Model');
        }

        return view('contacts.edit', compact('order', 'contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ContactRequest $request, Order $order)
    {
        $customer = Customer::findOrFail($order->customer->id);
        $customer->customerable()->update($request->all());
        return redirect()->route('order.show', [$order->id])->with('success', 'Contact updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
