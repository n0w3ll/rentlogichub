<?php

namespace App\Listeners;

use App\Events\RunUpdatePropertyStatusCommand;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Artisan;

class RunUpdatePropertyStatusCommandListener
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
    public function handle(RunUpdatePropertyStatusCommand $event): void
    {
        $command = $event->command;

        Artisan::call($command);
    }
}
