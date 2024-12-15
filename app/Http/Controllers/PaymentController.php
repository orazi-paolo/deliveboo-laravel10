<?php

namespace App\Http\Controllers;

use App\Helpers\DateTimeHelper;
use App\Mail\CustomerPaymentMail;
use App\Mail\PaymentMail;
use App\Models\Purchase;
use App\Models\Restaurant;
use App\Models\User;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Http\Request;
use Braintree\Gateway;
use Illuminate\Support\Facades\Mail;

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

            // Payment mails
            $restaurant = Restaurant::findOrFail($request->restaurant_id); // Get the restaurant where the customer made a purchase
            $user = User::findOrFail($request->restaurant_id); // Get the user where the customer made a purchase
            $currentDateTime = DateTimeHelper::getCurrentDate(); // Get current date and time
            $purchase = Purchase::findOrFail($purchase->id); // Get current purchase
            // PDF data
            $data = [
                'restaurantName' => $restaurant->name,
                'restaurantAddress' => $restaurant->address,
                'restaurantImg' => $restaurant->image,
                'restaurantImgPlaceholder' => $restaurant->image_placeholder,
                'customerName' => $request->name,
                'customerAddress' => $request->address,
                'billNr'=> $request->restaurant_id,
                'currentTime' => $currentDateTime,
                'totalPrice' => $request->total,
                'items' => $purchase->plates,
            ];

            $pdf = Pdf::loadView('invoices/customer-invoice', $data); // Generate pdf and pass $data as argument
            Mail::to([$user->email])->send(new PaymentMail($request->name, $request->address, $request->restaurant_id, $request->total, $request->plates, $restaurant->name)); // Send success payment email
            Mail::to([$request->email])->send(new CustomerPaymentMail($request->name, $request->address, $request->restaurant_id, $request->total, $request->plates, $restaurant->name,$user->email, $pdf)); // Send success payment email






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