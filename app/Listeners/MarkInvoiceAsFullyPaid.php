<?php

namespace App\Listeners;

use App\Events\RunUpdatePropertyStatusCommand;
use App\Events\TransactionPaid;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MarkInvoiceAsFullyPaid
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TransactionPaid $event): void
    {
        $invoice = $event->transaction->invoice;

        $totalPaidAmount = $invoice->transactions->sum('paid_amount');

        if ($totalPaidAmount >= $invoice->amount) {
            $invoice->update(['fully_paid' => true]);
        }
    }
}
