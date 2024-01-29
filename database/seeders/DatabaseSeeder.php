<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseSeeder extends Seeder
{
    /**
     * The Illuminate\Foundation\Testing\RefreshDatabase trait 
     * does not migrate your database if your schema is up to date. 
     * Instead, it will only execute the test within a database 
     * transaction. Therefore, any records added to the database by 
     * test cases that do not use this trait may still exist in the 
     * database.
     */
    // use RefreshDatabase;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Owner::factory(20)->create();
        \App\Models\Tenant::factory(20)->create();
        \App\Models\Property::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            // RoleSeeder::class,
            // PermissionSeeder::class,
            SuperadminSeeder::class
        ]);
    }
}
