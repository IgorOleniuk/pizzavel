@extends('layouts.app')

@section('content')
  <div class="container">
    <h1 class="text-center">Admin Panel</h1>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mt-3">
          <div class="card-header">My Orders</div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered ">
                <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">User Name</th>
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
                    <td> {{ $order->users->name }}</td>
                    <td>{{ $order->pizza_name }}</td>
                    <td>{{ $order->size }}</td>
                    <td>{{ $order->toppings ? $order->toppings : ' - ' }}</td>
                    <td>{{ $order->instructions ? $order->instructions : ' - '}}</td>
                    <td>{{ $order->address }}</td>
                    <td><a href="{{ route('admin.orders.edit', $order)  }}">{{ $order->status->name }}</a></td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
@endsection
