<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DeliveBoo Restaurant Mail Form</title>
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

        .logo {
            height: 50px;
            width: 50px
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

            <img src="https://cdn.iconscout.com/icon/free/png-256/free-deliveroo-logo-icon-download-in-svg-png-gif-file-formats--industry-company-brand-pack-logos-icons-2875354.png?f=webp&w=256"
                alt="deliveboo-logo" class="logo">

            <h1>DeliveBoo</h1>
        </a>
        <a href="http://localhost:5173/">Get Help</a>
    </header>
    <main>
        <h3>Hello {{$restaurantName}} Team,</h3>

        <h4>You have received a new order from DeliveBoo!</h4>

        <p>Order details:</p>

        <p>- Order ID: <span class="order-detail">{{$orderId}}</span></p>
        <p>- Restaurant: <span class="order-detail">{{$restaurantName}}</span></p>
        <p>- Delivery Address: <span class="order-detail">{{$customerAddress}}</span></p>
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

        <p>Please prepare the order for delivery to the customer as soon as possible. If you have any questions or need
            assistance,
            feel free to contact DeliveBoo support.</p>

        <h4>Thank you for being a part of DeliveBoo, and we hope the customer enjoys their meal!</h4>

        <p>Best regards,</p>
        <h4>The DeliveBoo Team 1</h4>
    </main>
    <footer>

        <p class="copyright">DeliveBoo is a service of delivery. © 2024
            DELIVEBOO ITALY SRL.</p>
    </footer>
</body>

</html>