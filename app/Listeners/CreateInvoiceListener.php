<?php

namespace App\Listeners;

use App\Events\RentCreated;
use App\Models\Invoice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateInvoiceListener
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
    public function handle(RentCreated $event): void
    {
        $rent = $event->rent;

        $uniqueId = substr(uniqid(), 0, 8);
        // Create a new Invoice model
        $invoice = Invoice::create([
            'number' => 'INV-' . $uniqueId,
            'rent_id' => $rent->id,
            'amount' => $rent->deposit,
            'fully_paid' => false,
        ]);
    }
}
