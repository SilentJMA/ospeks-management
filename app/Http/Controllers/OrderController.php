<?php

namespace App\Http\Controllers;
use App\Notifications\NewOrderNotification;
use App\Order;
use App\Product;
use App\Shipping;
use App\Status;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['status', 'supplier', 'shipping', 'product'])->get();

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
            'product_id' => 'required',
            'product_quantity' => 'required',
            'order_date' => 'required',
            'supplier_id' => 'required',
            'shipping_id' => 'required',
            'shipping_cost' => 'required',
            'shipping_country' => 'required',
            'shipping_tracking' => 'required',
            'status_id' => 'required',
        ]);

        $order = Order::create([
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'shipping_cost' => $request->shipping_cost,
            'order_cost' => ($request->product_price*$request->product_quantity)+$request->shipping_cost,
            'shipping_country' => $request->shipping_country,
            'shipping_tracking' => $request->shipping_tracking,
            'order_date' => $request->order_date,
            'note' => $request->note,
            'product_id' => $request->product_id,
            'shipping_id' => $request->shipping_id,
            'supplier_id' => $request->supplier_id,
            'status_id' => $request->status_id,
            'user_id' => auth()->user()->id

        ]);
        $order->save();
        Notification::send(auth()->user(), new NewOrderNotification($order));

        return redirect()->route('orders.index',compact('order'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order= Order::findOrFail($id);
        $status = Status::all();
        $products = Product::all();
        $suppliers = Supplier::all();
        $shippings = Shipping::all();

        return view('orders.edit', compact('order','status','shippings','products','suppliers'));
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
        $request->validate([
            'product_price' => 'required',
            'product_id' => 'required',
            'product_quantity' => 'required',
            'order_date' => 'required',
            'supplier_id' => 'required',
            'shipping_id' => 'required',
            'shipping_cost' => 'required',
            'shipping_country' => 'required',
            'shipping_tracking' => 'required',
            'status_id' => 'required',
        ]);

        $order = Order::findorFail($id);

        $order->update([
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'shipping_cost' => $request->shipping_cost,
            'order_cost' => ($request->product_price*$request->product_quantity)+$request->shipping_cost,
            'shipping_country' => $request->shipping_country,
            'shipping_tracking' => $request->shipping_tracking,
            'note' => $request->note,
            'order_date' => $request->order_date,
            'product_id' => $request->product_id,
            'shipping_id' => $request->shipping_id,
            'supplier_id' => $request->supplier_id,
            'status_id' => $request->status_id,
            'user_id' => auth()->user()->id

        ]);



        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Product::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index');
    }
}
