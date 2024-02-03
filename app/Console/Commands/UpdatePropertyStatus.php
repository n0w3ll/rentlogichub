<?php

namespace App\Console\Commands;

use App\Models\Rent;
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
        $today = now();

        // Query the rents table for entries with rent_end in the past
        $expiredRents = Rent::where('rent_end', '<', $today)->get();

        // Loop through expired rents and update the corresponding properties
        foreach ($expiredRents as $expiredRent) {
            $property = $expiredRent->property;
            $tenant = $expiredRent->tenant;

            // Check if the property is occupied
            if ($property->status == 'occupied') {
                // Update property status to vacant
                $property->update(['status' => 'vacant']);
            }
            if ($tenant->status == 'renting') {
                // Update tenant status to free
                $tenant->update(['status' => 'free']);
            }
        }

        $this->info('Renting statuses updated successfully.');
    }
}
