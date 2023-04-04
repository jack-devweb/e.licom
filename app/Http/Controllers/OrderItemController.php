<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderItems = OrderItem::all();
        return view('orderitems.index', ['orderItems' => $orderItems]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $orderItem = OrderItem::find($id);
        return view('orderitems.show', ['orderItem' => $orderItem]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $orderItem = OrderItem::find($id);
        return view('orderitems.edit', ['orderItem' => $orderItem]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $orderItem = OrderItem::find($id);
        $orderItem->quantity = $request->input('quantity');
        $orderItem->save();
        return redirect()->route('orderitems.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $orderItem = OrderItem::find($id);
        $orderItem->delete();
        return redirect()->route('orderitems.index');
    }
}
