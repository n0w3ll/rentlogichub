<?php

namespace App\Listeners;

use App\Events\RentCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateTenantStatus
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

        $tenant = $rent->tenant;
        $tenant->status = 'renting';
        $tenant->save();
    }
}
