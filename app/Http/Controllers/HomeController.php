<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $user = auth()->user();
    $orders = $user->orders()->get();

    return view('home', compact('orders'));
  }

  public function indexOrder()
  {
    return view('order_pizza');
  }

  public function saveOrder(Request $request)
  {
    $request->validate([
      'address' => 'required',
      'size' => 'required',
    ]);

    $order = Order::create([
      'pizza_name' => $request->pizza,
      'address' => $request->address,
      'size' => $request->size,
      'toppings' => implode(', ', $request->toppings),
      'instructions' => $request->instructions,
      'user_id' => auth()->user()->id,
    ]);

    return redirect()->route('order.show', $order)->with('message', 'Order received!');
  }

  public function show(Order $order)
  {
    return view('show_order', compact('order'));
  }
}
