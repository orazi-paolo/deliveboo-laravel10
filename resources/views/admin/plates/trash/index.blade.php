{{-- @extends('admin.plates.layouts.index-or-trash') --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
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
            bottom: 0;
            margin-bottom: 0;
        }

        main {
            width: 90%;
            margin: 0 auto;
            padding: 10px 0;
        }

        .address {
            display: flex;
            justify-content: space-between;
        }

        .business-logo {
            width: 70px;
            height: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
            align-self: center;
            border: 1px solid lightgray;
            border-radius: 4px
        }
    </style>
</head>

<body>
    <header class="invoice-header">
        <h3 class="header-title">Invoice</h3>
    </header>
    <main>
        <address class="address">
            <div class="business-address">
                <p>From:</p>
                <p>Restaurant Name</p>
                <p>Address</p>
            </div>
            <div class="business-logo">
                logo
            </div>
        </address>
        <address class="address">
            <div class="business-address">
                <p>Bill to:</p>
                <p>Customer Name</p>
                <p>Address</p>
            </div>
            <div class="bill-details">
                <p>Bill nr: #</p>
                <p>Order date: </p>
            </div>
        </address>
    </main>
</body>

</html>