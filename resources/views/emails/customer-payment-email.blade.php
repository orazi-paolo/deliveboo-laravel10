<h3>Dear {{$customer}},</h3>

<h4>Thank you for your order with {{$restaurantName}}!</h4>

<p>We are delighted to confirm your order details:</p>

<p>- Order ID: {{$orderId}}</p>
<p>- Restaurant: {{$restaurantName}}</p>
<p>- Delivery Address: {{$customerAddress}}</p>
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
<p>- Total Amount: {{$totalPrice}} </p>

<p>Your order is being prepared and will be delivered to your address shortly. You will receive an update once it’s on
    its
    way. If you have any questions or need to make changes to your order, please contact DeliveBoo customer service.
</p>

<h4>We hope you enjoy your meal, and thank you for choosing {{$restaurantName}}!</h4>

<p>Best regards,</p>
<h4>The {{$restaurantName}} Team 1 </h4>