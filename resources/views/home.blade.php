@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mt-5">
          <div class="card-header">My Orders</div>

          <div class="card-body">
            <order-alert user_id="{{ auth()->user()->id }}"></order-alert>

            @if ($orders->count() == 0)
              <p>No orders yet.</p>
              <a class="btn btn-success" href="{{ route('order') }}">Order Pizza</a>

            @else
            <div class="table-responsive">
              <table class="table table-bordered ">
                <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Pizza</th>
                  <th scope="col">Size</th>
                  <th scope="col">Toppings</th>
                  <th scope="col">Instructions</th>
                  <th scope="col">Address</th>
                  <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->pizza_name }}</td>
                    <td>{{ $order->size }}</td>
                    <td>{{ $order->toppings ? $order->toppings : ' - ' }}</td>
                    <td>{{ $order->instructions ? $order->instructions : ' - '}}</td>
                    <td>{{ $order->address }}</td>
                    <td><a href="{{ route('order.show', $order)  }}">{{ $order->status->name }}</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
