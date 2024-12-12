<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Braintree\Gateway;
use DateTime;

class PaymentController extends Controller
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
        ]);
    }

    public function getClientToken()
    {
        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
        ]);

        return response()->json(['token' => $gateway->clientToken()->generate()]);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'payment_method_nonce' => 'required',
            'total' => 'required|numeric|min:0.01',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'restaurant_id' => 'required|exists:restaurants,id',
            'plates' => 'required|array',
        ]);

        $result = $this->gateway->transaction()->sale([
            'amount' => $request->total,
            'paymentMethodNonce' => $request->payment_method_nonce,
            'options' => ['submitForSettlement' => true],
            'customer' => [
                'firstName' => $request->input('name'),
                ],
        ]);


        if ($result->success) {
            $purchase = Purchase::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'city' => $request->city,
                'restaurant_id' => $request->restaurant_id,
                'total' => $request->total,
                'date' => now(),
            ]);
            $plates = [];
            foreach($request->plates as $plate) {
                $plates[$plate['id']] = ['quantity' => $plate['quantity']];
            }
            $purchase->plates()->attach($plates);

            $purchase->load('plates');

            return response()->json([
                'success' => true,
                'message' => 'Pagamento avvenuto con successo!',
                'order' => $purchase,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => $result->message,
            ], 400);
        }
    }
}
