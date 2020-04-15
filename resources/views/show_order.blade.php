@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mt-5">
          <div class="card-header">Order Tracker</div>

          <div class="card-body">
            @if (session('message'))
              <div class="alert alert-success">
                {{ session('message') }}
              </div>
            @endif

            <order-progress status="{{  $order->status->name }}" initial="{{ $order->status->percent }}" order_id="{{ $order->id }}"></order-progress>

            <order-alert user_id="{{ auth()->user()->id }}"></order-alert>
            <hr>
            <div class="order-details">
              <strong>Order ID:</strong> {{ $order->id }} <br>
              <strong>Pizza:</strong> {{ $order->pizza_name }} <br>
              <strong>Size:</strong> {{ $order->size }} <br>
              <strong>Toppings:</strong> {{ $order->toppings }} <br>

              @if ($order->instructions != '')
                <strong>Instructions:</strong> {{ $order->instructions }}
              @endif

            </div>

              <a class="btn btn-primary mt-3" href="{{ route('home') }}">Back to Orders</a>

          </div>
        </div>
      </div>
    </div>
@endsection
