<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $suppliers = Supplier::all();

        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $suppliers = Supplier::all();
        return view('suppliers.create', compact('suppliers'));
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
            'address' => 'required',
            'country' => 'required',
            'email' => 'required',
        ]);

        Supplier::create([
            'name' => $request->name,
            'address' => $request->address,
            'country' => $request->country,
            'phone' => $request->phone,
            'url' => $request->url,
            'email' => $request->email,
            'note' => $request->note,
            'user_id' => auth()->user()->id

        ]);



        return redirect()->route('suppliers.index');
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
        $supplier = Supplier::findOrFail($id);

        return view('suppliers.edit', compact('supplier'));
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
            'address' => 'required',
            'country' => 'required',
            'email' => 'required',
        ]);
        $supplier = Supplier::findorFail($id);

        $supplier->update([
            'name' => $request->name,
            'address' => $request->address,
            'country' => $request->country,
            'phone' => $request->phone,
            'url' => $request->url,
            'email' => $request->email,
            'note' => $request->note,
            'user_id' => auth()->user()->id

        ]);

        return redirect()->route('suppliers.index');
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
