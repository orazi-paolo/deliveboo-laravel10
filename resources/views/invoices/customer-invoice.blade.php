<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    {{-- CSS style --}}
    <style>
        /* Generics */
        img {
            max-width: 100%;
        }

        /* utils */

        .invoice-header {
            height: 100px;
            background-image: url('https://image.slidesdocs.com/responsive-images/background/burger-food-restaurant-powerpoint-background_b120f0b497__960_540.jpg');
            background-position: center;
            background-size: cover;
            position: relative;
            margin-bottom: 20px;
        }

        .header-title {
            display: inline-block;
            background-color: white;
            border-radius: 5px 5px 0 0;
            padding: 10px 20px;
            position: absolute;
            right: 50px;
            bottom: -1px;
            margin-bottom: 0;
        }

        main {
            width: 90%;
            margin: 0 auto;
            padding: 10px 0;
        }

        address {
            border-bottom: 2px solid lightgray;
            margin-bottom: 50px;
        }

        .address {
            /* display: flex;
            justify-content: space-between; */

            display: block;
        }

        .business-address,
        .bill-address {
            display: inline-block;
        }

        .business-logo {
            display: inline-block;
            float: right;
            width: 70px;
            height: 70px;
            border: 1px solid lightgray;
            border-radius: 4px;
        }

        .bill-details {
            float: right;
            display: inline-block;
        }

        table {
            font-family: arial, sans-serif;
            width: 100%;
        }

        td {
            border-bottom: 1px solid lightgray;
            text-align: center;
            padding: 10px 0;
        }

        th {
            background-color: rgb(3, 203, 187);
            text-align: center;
            padding: 8px;
        }

        .hidden {
            visibility: hidden;
        }

        .total-price {
            text-align: center;
            font-style: italic;
            padding: 10px;
        }

        footer {
            font-weight: bold;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <header class="invoice-header">
        <h3 class="header-title">Invoice</h3>
    </header>
    <main>
        <address>
            <div class="address">
                <div class="business-address">
                    <h4>From:</h4>
                    <p>{{$restaurantName}}</p>
                    <p>{{$restaurantAddress}}</p>
                </div>
                <div class="business-logo">
                    <img src="https://www.adaptivewfs.com/wp-content/uploads/2020/07/logo-placeholder-image.png"
                        alt="Logo placeholder">
                    {{-- @if ($restaurantImg)
                    <img src="{{$restaurantImg}}" alt="{{$restaurantName}} logo" class="logo">
                    @else
                    <img src="{{$restaurantImgPlaceholder}}" alt="{{$restaurantName}} logo" class="logo">
                    @endif --}}
                </div>
            </div>
            <div class="address">
                <div class="bill-address">
                    <h4>Bill to:</h4>
                    <p>{{$customerName}}</p>
                    <p>{{$customerAddress}}</p>
                </div>
                <div class="bill-details">
                    <p>Bill nr: # {{ $billNr }}</p>
                    <p>Order date: {{$currentTime}}</p>
                </div>
            </div>
        </address>
        <div class="order">
            <table>
                <tr>
                    <th>Item title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                @foreach ($items as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->pivot->quantity}}</td>
                    <td>{{$item->pivot->quantity * $item->price}} €</td>
                </tr>
                @endforeach
                <tr>
                    <th class="hidden"></th>
                    <th class="hidden"></th>
                    <th class="total-price">{{$totalPrice}} €</th>
                </tr>
            </table>
            <footer>
                <p>Thank you for your purchase. We appreciate your trust in us and look forward to serving you again.
                </p>
            </footer>
        </div>
    </main>
</body>

</html>