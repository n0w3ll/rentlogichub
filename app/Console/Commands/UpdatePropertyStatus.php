<?php

namespace App\Console\Commands;

use App\Models\Rent;
use Carbon\CarbonImmutable;
use Illuminate\Console\Command;

class UpdatePropertyStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:property-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update property status based on rents start and end date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = CarbonImmutable::now();

        $expiredRents = Rent::where('rent_end', '<', $today)->get();
        $ongoingRents = Rent::where('rent_end', '>=', $today)->get();

        // Loop through expired rents and update the corresponding properties
        // regardless rent paid or not
        foreach ($expiredRents as $expiredRent) {
            $property = $expiredRent->property;
            $tenant = $expiredRent->tenant;

            if (($property->status == 'occupied') || ($property->status == 'pending')) {
            }
            if ($tenant->status == 'renting') {
            }
            $property->update(['status' => 'vacant']);
            $tenant->update(['status' => 'free']);
            $expiredRent->update(['status' => 'ended']);
        }

        foreach ($ongoingRents as $ongoingRent) {
            $property = $ongoingRent->property;
            $tenant = $ongoingRent->tenant;

            // Check if rent is already paid
            if ($ongoingRent->paid == true) {
                if (($property->status == 'vacant') || ($property->status == 'pending')) {
                    $property->update(['status' => 'occupied']);
                }
                if ($tenant->status == 'free') {
                    $tenant->update(['status' => 'renting']);
                }
                $ongoingRent->update(['status' => 'ongoing']);
            } else {
                $ongoingRent->update(['status' => 'pending']);
            }
        }

        $this->info('Renting statuses updated successfully.');
    }
}
