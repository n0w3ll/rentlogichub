<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Super Admin with 'admin' role
        $superadmin = User::create([
            'name' => 'Super Admin',
            'username' => 'sadmin',
            'email' => 'admin@sadmin.com',
            'password' => Hash::make('qpAL1029#')
        ]);
        // $superadmin->assignRole('admin');

        // Test Manager with 'manager' role
        // $manager = User::create([
        //     'name' => 'Test Manager',
        //     'username' => 'tmanager',
        //     'email' => 'tmanager@manager.com',
        //     'password' => Hash::make('abc12345')
        // ]);
        // $manager->assignRole('manager');

        // Test Owner with 'owner' role
        // $owner = User::create([
        //     'name' => 'Test Owner',
        //     'username' => 'towner',
        //     'email' => 'towner@owner.com',
        //     'password' => Hash::make('abc12345')
        // ]);
        // $owner->assignRole('owner');

        // Test Agent with 'agent' role
        // $agent = User::create([
        //     'name' => 'Test Agent',
        //     'username' => 'tagent',
        //     'email' => 'tagent@agent.com',
        //     'password' => Hash::make('abc12345')
        // ]);
        // $agent->assignRole('agent');

        // Test Tenant with 'tenant' role
        // $tenant = User::create([
        //     'name' => 'Test Tenant',
        //     'username' => 'ttenant',
        //     'email' => 'ttenant@tenant.com',
        //     'password' => Hash::make('abc12345')
        // ]);
        // $tenant->assignRole('tenant');
    }
}
