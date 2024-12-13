<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    // Variables
    public $customer;
    public $customerAddress;
    public $orderId;
    public $totalPrice;
    public $itemsOrderedList;
    public $restaurantName;

    /**
     * Create a new message instance.
     */
    public function __construct($customer, $customerAddress, $orderId, $totalPrice, $itemsOrderedList,$restaurantName)
    {
        $this->customer = $customer;
        $this->customerAddress = $customerAddress;
        $this->orderId = $orderId;
        $this->totalPrice = $totalPrice;
        $this->itemsOrderedList = $itemsOrderedList;
        $this->restaurantName = $restaurantName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Payment Mail: $this->customer has made a new purchase"
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: ('emails/payment-email'),
        );
    }

    /**
     * Builds and configures the email to be sent after a successful payment.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@deliveboo.com')  // Sender Address
                    ->with([
                        $this->customer,
                        $this->customerAddress,
                        $this->orderId,
                        $this->totalPrice ,
                        $this->itemsOrderedList,
                        $this->restaurantName ,
                    ]);

    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}