<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders();
        return view('user.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('user.orders.create');
    }

    public function store(OrderRequest $request)
    {
        $validatedData = $request->validated();

        $order = Auth::user()->orders()->create($validatedData);

        return redirect()->route('user.orders.show', $order->id);
    }

    public function edit($id)
    {
        $order = Auth::user()->orders()->findOrFail($id);
        return view('user.orders.edit', compact('order'));
    }

    public function update(OrderRequest $request, $id)
    {
        $validatedData = $request->validated();

        $order = Auth::user()->orders()->findOrFail($id);
        $order->update($validatedData);

        return redirect()->route('user.orders.show', $order->id);
    }

    public function destroy($id)
    {
        $order = Auth::user()->orders()->findOrFail($id);
        $order->delete();

        return redirect()->route('user.orders.index');
    }
}
