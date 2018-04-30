<?php

namespace App\Http\Controllers;

use App\Action;
use App\OrderStatus;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function myOrders(Request $request) {
        $orders = Order::where('customer_id', '=', $request->user()->contact->customer->id)->get();
        return view('orders.my-orders', compact('orders'));
    }

    /**
     * Search Function
     * @param Request $request
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request) {
        // forget any messages from past searches
        $request->session()->forget('info');

        // we want to search contacts
        if($request->input('searchType') == 'contact') {
            $orders = Order::query()
                ->join('customers', 'orders.customer_id', '=', 'customers.id')
                ->join('contacts', 'contacts.id', '=', 'customers.customerable_id')
                ->join('properties', 'orders.property_id', '=', 'properties.id')
                ->whereHas('customer', function($q) {
                    $q->where('customerable_type', '=', 'App\Contact');
                })
                ->where(function ($query) use ($request) {
                    $query->where('contacts.first_name', 'like', '%'.$request->input('search').'%')
                        ->orWhere('contacts.last_name', 'like', '%'.$request->input('search').'%')
                        ->orWhere('orders.enterprise_order_number', 'like', '%'.$request->input('search').'%')
                        ->orWhere('properties.address2', 'like', '%'.$request->input('search').'%')
                        ->orWhere('properties.state', 'like', '%'.$request->input('search').'%')
                        ->orWhere('properties.city', 'like', '%'.$request->input('search').'%')
                        ->orWhere('properties.zip_code', 'like', '%'.$request->input('search').'%')
                        ->orWhere('properties.address1', 'like', '%'.$request->input('search').'%')
                        ->orWhere('properties.address2', 'like', '%'.$request->input('search').'%');
                })
                ->orderBy('contacts.first_name',  $request->input('searchDirection'))
                ->get();
        } else { // we want to search companies
            $orders = Order::query()
                ->join('customers', 'orders.customer_id', '=', 'customers.id')
                ->whereHas('customer', function($q) {
                    $q->where('customerable_type', '=', 'App\Company');
                })
                ->join('companies', 'companies.id', '=', 'customers.customerable_id')
                ->join('properties', 'orders.property_id', '=', 'properties.id')
                ->where(function ($query) use ($request) {
                    $query->where('companies.company_name', 'like', '%'.$request->input('search').'%')
                        ->orWhere('properties.address2', 'like', '%'.$request->input('search').'%')
                        ->orWhere('orders.enterprise_order_number', 'like', '%'.$request->input('search').'%')
                        ->orWhere('properties.state', 'like', '%'.$request->input('search').'%')
                        ->orWhere('properties.city', 'like', '%'.$request->input('search').'%')
                        ->orWhere('properties.zip_code', 'like', '%'.$request->input('search').'%')
                        ->orWhere('properties.address1', 'like', '%'.$request->input('search').'%')
                        ->orWhere('properties.address2', 'like', '%'.$request->input('search').'%');
                })
                ->orderBy('companies.company_name', $request->input('searchDirection'))
                ->get();
        }

        $input = [
            'search' => $request->input('search'),
            'direction' => $request->input('searchDirection'),
            'type' => $request->input('searchType')
        ];

        if($orders->count() < 1) {
            // no orders found, let the user know
            Session::flash('info', 'No orders found!');
            return view('orders.index', compact('orders', 'input'));
        } else {
            // orders were found
            return view('orders.index', compact('orders', 'input'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $orderStatuses = OrderStatus::lists('status_name', 'id');
        return view('orders.edit', compact('order', 'orderStatuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\OrderEditRequest $request, Order $order)
    {
        $order->actions()->save(
            new Action([
                'user_id' => $request->user()->id,
                'action_type_id' => $request->input('orderStatus'),
                'notes' => $request->input('notes')
            ]));

        return redirect()->route('order.show', [$order->id])->with('success', 'Order updated!');
    }
}
