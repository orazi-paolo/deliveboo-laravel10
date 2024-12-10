<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use Braintree\Gateway;

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

    public function checkout(Request $request)
    {
        $request->validate([
            'payment_method_nonce' => 'required',
            'total' => 'required|numeric|min:0.01',
        ]);

        $result = $this->gateway->transaction()->sale([
            'amount' => $request->total,
            'paymentMethodNonce' => $request->payment_method_nonce,
            'options' => ['submitForSettlement' => true],
        ]);


        if ($result->success) {
            return response()->json([
                'success' => true,
                'message' => 'Pagamento avvenuto con successo!',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => $result->message,
            ], 400);
        }
    }
}