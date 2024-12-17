<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DeliveBoo Customer Mail Form</title>
    {{-- CSS style --}}
    <style>
        /* Generics */
        img {
            max-width: 100%;
        }

        header {
            height: 70px;
            padding: 5px 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-image:
                url('https://image.slidesdocs.com/responsive-images/background/burger-food-restaurant-powerpoint-background_b120f0b497__960_540.jpg');
            background-position: center;
            background-size: cover;
        }

        a {
            color: rgb(3, 203, 187);
            text-decoration: none;
        }

        main {
            width: 70%;
            margin: 0 auto
        }

        footer {
            height: 70px;
            padding: 5px 10px;
            background-image: url('https://img.freepik.com/premium-photo/clay-dishes-plate-top-view-free-space-your-text_187166-10574.jpg?semt=ais_hybrid');
            background-position: bottom;
            background-size: cover;
        }

        /* Utils */
        .header-logo {
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .order-detail {
            font-weight: bold;
        }

        .copyright {
            color: white;
            font-size: 12px
        }
    </style>
</head>

<body>
    <header>
        <a href="http://localhost:5173/" class="header-logo">

            <h1>{{$restaurantName}}</h1>
        </a>
        <a href="http://localhost:5173/">Get Help</a>
    </header>
    <main>
        <h3>Dear {{$customer}},</h3>

        <h4>Thank you for your order with {{$restaurantName}}!</h4>

        <p>We are delighted to confirm your order details:</p>

        <p>- Order ID: <span class="order-detail">{{$orderId}}</span></p>
        <p>- Restaurant: <span class="order-detail">{{$restaurantName}}</span></p>
        <p>- Delivery Address: <span class="order-detail">{{$customerAddress}}</span>
        </p>
        {{-- <ul>
            <li>
                Items:
            </li>
            @foreach ($itemsOrderedList as $item)
            <li>
                {{$item['name']}}
            </li>
            @endforeach
        </ul> --}}
        <p>- Total Amount: <span class="order-detail">{{$totalPrice}} €</span></p>

        <p>In the attachments above, you will find your invoice for the transaction.</p>

        <p>Your order is being prepared and will be delivered to your address shortly. You will receive an update once
            it’s
            on
            its
            way. If you have any questions or need to make changes to your order, please contact DeliveBoo customer
            service.
        </p>

        <h4>We hope you enjoy your meal, and thank you for choosing {{$restaurantName}}!</h4>

        <p>Best regards,</p>
        <h4>{{$restaurantName}}</h4>
    </main>
    <footer>

        <p class="copyright"> © 2020 {{$restaurantName}}.</p>
    </footer>
</body>

</html>