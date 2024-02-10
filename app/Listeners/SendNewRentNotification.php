<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\NewRentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendNewRentNotification
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
    public function handle(object $event): void
    {
        $sadmin = User::where('id', 1)->get();

        Notification::send($sadmin, new NewRentNotification($event->rent));
    }
}
