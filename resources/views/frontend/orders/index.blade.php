@extends('layouts.app')

@section('content')
<h3>Orders</h3>

<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Order No</th>
        <th>Total</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    @foreach ($orders as $order)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $order->orderNo }}</td>
        <td>RM {{ $order->totalAmount }}</td>
        <td>{{ ucfirst($order->status) }}</td>
        <td>
         
               @can('Edit Record') 
                <a href="{{ route('orders.edit', $order->id) }}" 
                    class="btn btn-sm btn-warning">
                    <i class="bi bi-pencil-square"></i>
                </a>  
                @endcan        
            <form action="{{ route('orders.delete', $order) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $orders->links() }}
@endsection
