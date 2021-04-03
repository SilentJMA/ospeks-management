<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('categories')->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));

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
            'name' => 'required',
            'price' => 'required',
            'sku' => 'required',
            'status' => 'required',
        ]);

        $path = $request->file('image')->store('images','public');

        Product::create([
            'name' => $request->name,
            'image' => $request->image,
            'description' => $request->description,
            'price' => $request->price,
            'sku' => $request->sku,
            'quantity' => $request->quantity,
            'status' => $request->status,
            'image' => $path

        ]);

        return redirect()->route('products.index');
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
        $product = Product::findorFail($id);
        $categories = Category::all();

        return view('products.edit', compact('product','categories'));
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
            'name' => 'required',
            'price' => 'required|decimal',
            'sku' => 'required',
            'status' => 'required',
        ]);
        $product = Product::findorFail($id);

        $product->update([
            'name' => $request->name,
            'image' => $request->image,
            'description' => $request->description,
            'price' => $request->price,
            'sku' => $request->sku,
            'quantity' => $request->quantity,
            'status' => $request->status,
            'image' => ''        ]);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findorFail($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}
