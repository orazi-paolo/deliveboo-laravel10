<h3>Hello {{$restaurantName}} Team,</h3>

<h4>You have received a new order from DeliveBoo!</h4>

<p>Order details:</p>

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
<p>- Total Amount: {{$totalPrice}}</p>

<p>Please prepare the order for delivery to the customer as soon as possible. If you have any questions or need
    assistance,
    feel free to contact DeliveBoo support.</p>

<h4>Thank you for being a part of DeliveBoo, and we hope the customer enjoys their meal!</h4>

<p>Best regards,</p>
<h4>The DeliveBoo Team 1</h4>