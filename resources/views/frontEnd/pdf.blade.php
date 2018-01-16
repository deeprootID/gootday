<!DOCTYPE html>
<html>

<head>
    
    <title>Payment Information</title>
    
</head>

<body>

    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 30px;">
            <h1>{{ Auth::user()->name }}'s Orders</h1>
            <hr>
            <h4>Date: {{ substr($order->created_at,0,10) }}</h4>
            <table border="1">
                <tr><td width="300px">Nama Produk</td><td width="150px">Harga Produk</td><td width="150px">Jumlah Pembelian</td></tr>
                @foreach($order->cart->items as $item)
                <tr>
                    <td> {{ $item['item']['nama'] }} </td>
                    <td> Rp {{ $item['price'] }} </td>
                    <td> {{ $item['qty'] }} Units </td>
                </tr>
                @endforeach
            </table>
            <div class="panel panel-default" style="margin-top: 10px;">
                
                <div class="panel-footer">
                    <strong>Total price : Rp {{ $order->cart->totalPrice }}</strong>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
