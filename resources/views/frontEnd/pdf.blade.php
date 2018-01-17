<!DOCTYPE html>
<html>

<head>
    
    <title>Payment Information</title>
    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>

</head>

<body>

    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 30px;">
            <h1>{{ Auth::user()->name }}'s Orders</h1>
            <hr>
            <h4>Date: {{ substr($order->created_at,0,10) }}</h4>
            <table border="1" id="customers">
                <tr><th width="300px" align="center">Nama Produk</th><th width="150px" align="center">Harga Produk</th><th width="150px" align="center">Jumlah Pembelian</th></tr>
                @foreach($order->cart->items as $item)
                <tr>
                    <td align="center"> {{ $item['item']['nama'] }} </td>
                    <td align="center"> Rp {{ $item['price'] }} </td>
                    <td align="center"> {{ $item['qty'] }} Units </td>
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
