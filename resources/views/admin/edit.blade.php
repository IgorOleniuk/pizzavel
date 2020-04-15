@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mt-5">
          <div class="card-header">Edit Order Status</div>

          <div class="card-body">
            @if (session('message'))
              <div class="alert alert-success">
                {{ session('message') }}
              </div>
            @endif

            <div class="order-details">
              <strong>Order ID:</strong> {{ $order->id }} <br>
              <strong>Customer:</strong> {{ $order->users->name }} <br>
              <strong>Pizza:</strong> {{ $order->pizza_name }} <br>
              <strong>Size:</strong> {{ $order->size }} <br>
              <strong>Toppings:</strong> {{ $order->toppings }} <br>

              @if ($order->instructions != '')
                <strong>Instructions:</strong> {{ $order->instructions }}
              @endif

              <form action="{{ route('admin.orders.update', $order) }}" method="post" id="update-order-status-form" class="form-horizontal">
                {{ csrf_field() }}
                {!! method_field('patch') !!}

                <div class="form-group">
                  <label for="status_id" class="control-label col-lg-3">
                    Status:
                  </label>
                  <div class="controls col-lg-8">
                    <select name="status_id" id="status_id" class="dropdown-style input-field input-normal">
                      @foreach($statuses as $status)
                        <option value="{{ $status->id }}" {{ old('status', $currentStatus) == $status->id ? 'selected' : ''  }}>{{ $status->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-lg-3"></div>
                  <div class="controls col-lg-8">
                    <div class="form-actions">
                      <button type="submit" id="update-order" class="btn btn-success">Update Status</button>
                    </div>
                  </div>
                </div>

              </form>

            </div>

          </div>
        </div>
      </div>
  </div>
@endsection
