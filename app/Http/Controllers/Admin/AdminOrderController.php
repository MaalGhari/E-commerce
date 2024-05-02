<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('admin.orders.create');
    }

    public function store(OrderRequest $request)
    {
        $validatedData = $request->validated();

        $order = Order::create($validatedData);

        return redirect()->route('admin.orders.show', $order->id);
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.edit', compact('order'));
    }

    public function update(OrderRequest $request, $id)
    {
        $validatedData = $request->validated();

        $order = Order::findOrFail($id);
        $order->update($validatedData);

        return redirect()->route('admin.orders.show', $order->id);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index');
    }
}
