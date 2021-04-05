<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Shipping;
use App\Status;
use App\Supplier;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('status')->get();

        return view('orders.index', compact('orders'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = Status::all();
        $products = Product::all();
        $suppliers = Supplier::all();
        $shippings = Shipping::all();

        return view('orders.create', compact('status','shippings','products','suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_price' => 'required',
            'product_name' => 'required',
            'product_quantity' => 'required',
            'supplier_name' => 'required',
            'shipping_method' => 'required',
            'shipping_country' => 'required',
            'shipping_tracking' => 'required',
            'status_id' => 'required',
        ]);

        Order::create([
            'product_price' => $request->product_price,
            'product_name' => $request->product_name,
            'product_quantity' => $request->product_quantity,
            'supplier_name' => $request->supplier_name,
            'shipping_method' => $request->shipping_method,
            'shipping_country' => $request->shipping_country,
            'shipping_tracking' => $request->shipping_tracking,
            'note' => $request->note,
            'status_id' => $request->status_id,
            'user_id' => auth()->user()->id

        ]);



        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
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
