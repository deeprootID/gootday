<!DOCTYPE html>
<html>
<head>
    <title>Payment Information</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 30px;">
            <h1>Hi, {{ Auth::user()->name }}</h1>
            <h2>Date : {{ substr($order->created_at, 0, 10) }}</h2>
            <hr>
            <h2>My Orders</h2>
            <?php $i = 0 ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->cart->items as $item)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $item['item']['nama'] }}</td>
                        <td>Rp {{ $item['price'] }}</td>
                        <td>{{ $item['qty'] }} Units</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <strong>Total price : Rp {{ $order->cart->totalPrice }}</strong>
        </div>
    </div>
</body>
</html>
