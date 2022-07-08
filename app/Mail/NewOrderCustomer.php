<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrderCustomer extends Mailable
{
    use Queueable, SerializesModels;

    protected $newOrder;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_order)
    {
        $this->newOrder = $_order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Riepilogo ordine')->view('mail.new-order-customer')->with(['data'  =>  $this->newOrder ]);
    }
}
