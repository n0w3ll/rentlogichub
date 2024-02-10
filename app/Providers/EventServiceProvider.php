<?php

namespace App\Providers;

use App\Events\RentCreated;
use App\Events\RentStatusChanged;
use App\Events\RunUpdatePropertyStatusCommand;
use App\Events\TransactionPaid;
use App\Listeners\CreateInvoiceListener;
use App\Listeners\MarkInvoiceAsFullyPaid;
use App\Listeners\RentStatusChangedListener;
use App\Listeners\RunUpdatePropertyStatusCommandListener;
use App\Listeners\SendNewRentNotification;
use App\Listeners\UpdatePropertyStatus;
use App\Listeners\UpdateTenantStatus;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        RentCreated::class => [
            UpdatePropertyStatus::class,
            UpdateTenantStatus::class,
            CreateInvoiceListener::class,
            SendNewRentNotification::class,
        ],
        RunUpdatePropertyStatusCommand::class => [
            RunUpdatePropertyStatusCommandListener::class,
        ],
        TransactionPaid::class => [
            MarkInvoiceAsFullyPaid::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
