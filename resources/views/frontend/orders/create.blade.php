@extends('layouts.app')

@section('content')
<h3>Create Order</h3>

<form method="POST" action="{{ route('orders.store') }}">
    @csrf

    <div class="mb-3">
        <label>Order Number</label>
        <input type="text" name="order_number" class="form-control">
    </div>

    <div class="mb-3">
        <label>Total Amount</label>
        <input type="number" step="0.01" name="total_amount" class="form-control">
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="pending">Pending</option>
            <option value="processing">Processing</option>
            <option value="completed">Completed</option>
        </select>
    </div>

    <button class="btn btn-success">Save</button>
</form>
@endsection
