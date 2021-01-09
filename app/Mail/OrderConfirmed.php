<?php

namespace App\Mail;

use App\Actions\CreateInvoice;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmed extends Mailable
{
    use Queueable;
    use SerializesModels;

    private Order $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fileName = 'invoice_' . $this->order->number . '.pdf';
        $action = new CreateInvoice();
        $invoice = $action->execute($this->order);
        $invoice->save(storage_path('invoices/' . $fileName), true);

        return $this->view('mail.order', ["order" => $this->order])
            ->attach(storage_path('invoices/' . $fileName));
    }
}
