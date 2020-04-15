<?php

namespace App\Http\Controllers;

use App\Events\OrderStatusChanged;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
  public function index()
  {
    $orders = Order::all();

    return view('admin.index', compact('orders'));
  }

  public function edit(Order $order)
  {
    $statuses = Status::all();
    $currentStatus = $order->status_id;

    return view('admin.edit', compact('order', 'statuses', 'currentStatus'));
  }

  public function update(Request $request, Order $order)
  {
    $request->validate([
    'status_id' => 'required|numeric',
    ]);

    $order->status_id = $request->status_id;
    $order->save();

    event(new OrderStatusChanged($order));

    return back()->with('message', 'Order Status updated successfully!');
  }
}
