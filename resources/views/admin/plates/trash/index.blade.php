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

        address {
            margin-bottom: 50px;
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

        table {
            font-family: arial, sans-serif;
            width: 100%;
        }

        td {
            border-bottom: 1px solid lightgray;
            text-align: center;
            padding: 8px;
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
                    <p>Restaurant Name</p>
                    <p>Address</p>
                </div>
                <div class="business-logo">
                    logo
                </div>
            </div>
            <div class="address">
                <div class="business-address">
                    <h4>Bill to:</h4>
                    <p>Customer Name</p>
                    <p>Address</p>
                </div>
                <div class="bill-details">
                    <p>Bill nr: #</p>
                    <p>Order date: </p>
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
                <tr>
                    <td>plate name</td>
                    <td>5</td>
                    <td>50 €</td>
                </tr>
                <tr>
                    <th class="hidden"></th>
                    <th class="hidden"></th>
                    <th class="total-price">Total: 50 €</th>
                </tr>
            </table>
        </div>
    </main>
</body>

</html>