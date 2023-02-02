<?php

namespace App\Mail;

use App\Classes\Basket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $name;
    protected $basket;
    public function __construct($name, Basket $basket)
    {
        $this->name = $name;
        $this->basket = $basket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $orderSum = $this->basket->getOrder()->getOrderCost();
        return $this->view('mail.order_created', ['name' => $this->name, 'basket' => $this->basket, 'ordersum' => $orderSum]);
    }
}
