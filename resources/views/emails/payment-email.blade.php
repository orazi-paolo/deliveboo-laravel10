<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DeliveBoo Restaurant Mail Form</title>
</head>

<body>
    <header style="height: 70px;
                   padding: 5px 10px;
                   display:flex;
                   justify-content:space-between;
                   align-items:center;
                   background-image:url('https://image.slidesdocs.com/responsive-images/background/burger-food-restaurant-powerpoint-background_b120f0b497__960_540.jpg');
                   background-position: center;
                   background-size:cover;
                   ">

        <a href="http://localhost:5173/" style="text-decoration: none;
                                                display:flex;
                                                justify-content:space-between;
                                                align-items:center">

            <img src="https://cdn.iconscout.com/icon/free/png-256/free-deliveroo-logo-icon-download-in-svg-png-gif-file-formats--industry-company-brand-pack-logos-icons-2875354.png?f=webp&w=256"
                alt="deliveboo-logo" style="height: 50px; width: 50px">

            <h1 style="color: rgb(3,203,187)">DeliveBoo</h1>
        </a>
        <a href="http://localhost:5173/" style="text-decoration: none; color: rgb(3,203,187)">Get Help</a>
    </header>
    <main style="width: 70%; margin: 0 auto">
        <h3>Hello {{$restaurantName}} Team,</h3>

        <h4>You have received a new order from DeliveBoo!</h4>

        <p>Order details:</p>

        <p>- Order ID: <span style="font-weight: bold">{{$orderId}}</span></p>
        <p>- Restaurant: <span style="font-weight: bold">{{$restaurantName}}</span></p>
        <p>- Delivery Address: <span style="font-weight: bold">{{$customerAddress}}</span></p>
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
        <p>- Total Amount: <span style="font-weight: bold">{{$totalPrice}} €</span></p>

        <p>Please prepare the order for delivery to the customer as soon as possible. If you have any questions or need
            assistance,
            feel free to contact DeliveBoo support.</p>

        <h4>Thank you for being a part of DeliveBoo, and we hope the customer enjoys their meal!</h4>

        <p>Best regards,</p>
        <h4>The DeliveBoo Team 1</h4>
    </main>
    <footer style="height: 70px;
                       padding: 5px 10px;
                       background-image:url('https://img.freepik.com/premium-photo/clay-dishes-plate-top-view-free-space-your-text_187166-10574.jpg?semt=ais_hybrid');
                       background-position: bottom;
                       background-size:cover;
                       ">

        <p style="color: white; font-size:12px">DeliveBoo is a service of delivery. © 2024 DELIVEBOO ITALY SRL.</p>
    </footer>
</body>

</html>