<?php

namespace App\Http\Controllers;

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
        $orders = Order::findOrFail($request->user()->id);
    }
    
    public function search(Request $request) {
        $request->session()->forget('info');
        $ordersContacts = Order::query()
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->join('contacts', 'contacts.id', '=', 'customers.customerable_id')
            ->where('customerable_type', '=', 'App\Contact')
            ->where(function ($query) use ($request) {
                $query->where('contacts.first_name', 'like', '%'.$request->input('search').'%')
                    ->orWhere('contacts.last_name', 'like', '%'.$request->input('search').'%');
            })
            ->orderBy('contacts.first_name', 'desc')
            ->get();

        $ordersCompanyContacts = Order::query()
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->where('customers.customerable_type', '=', 'App\Company')
            ->join('companies', 'companies.id', '=', 'customers.customerable_id')
            ->where(function ($query) use ($request) {
                $query->where('companies.company_name', 'like', '%'.$request->input('search').'%');
            })
            ->orderBy('companies.company_name', 'desc')
            ->get();

        $orders = $ordersContacts->merge($ordersCompanyContacts);
        $input = $request->input('search');

        if($orders->count() < 1) {
            Session::flash('info', 'No orders found!');
            return view('orders.index', compact('orders', 'input'));
        } else {
            return view('orders.index', compact('orders', 'input'));
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }
}
