@extends('backEnd.master')
@section('page-title', 'Orders')
@section('page-heading', 'Manage Orders')
@section('content')
<section class="content">
    <div class="col-xs-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <?php $i = 0?>
                    <th>Date</th>
                    <th>User ID</th>
                    <th>Address</th>
                    <th>User Name</th>
                    <th>Order ID</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->payment_id }}</td>
                    <td><span class="{{ $order->payment_status == 'Confirmed' ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove' }}"></span>  {{ $order->payment_status }}</td>
                    <td><a href="{{ $order->payment_status == 'Confirmed' ? route('order.unconfirm', ['id' => $order->id]) : route('order.confirm', ['id' => $order->id]) }}" class="{{ $order->payment_status == 'Confirmed' ? 'btn btn-danger' : 'btn btn-primary' }}">{{ $order->payment_status == 'Confirmed' ? 'Unconfirm' : 'Confirm' }}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection