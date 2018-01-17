<!DOCTYPE html>
<html>

<head>
    @include('frontEnd.includes.head')
    <title>Payment Information</title>
    @yield('stylesheet') @include('frontEnd.includes.script')
</head>

<body>
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 30px;">
            <h1>Hi, {{ Auth::user()->name }}</h1>
            <hr>
            <h2>My Orders</h2>
            {{-- @foreach($orders as $order) --}}
            <div class="panel panel-default" style="margin-top: 10px;">
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($order->cart->items as $item)
                        <li class="list-group-item">
                            <span class="badge">Rp {{ $item['price'] }}</span> {{ $item['item']['nama'] }} | {{ $item['qty'] }} Units
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="panel-footer">
                    <strong>Total price : Rp {{ $order->cart->totalPrice }}</strong>
                    <a href="{{ route('user.printtopdf', ['id' => $order->id]) }}" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> Print</a>
                </div>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
</body>

</html>
