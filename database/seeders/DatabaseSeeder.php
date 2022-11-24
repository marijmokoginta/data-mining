<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DashboardFeature;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DashboardFeature::create([
            'name' => 'Feature 1'
        ]);
        DashboardFeature::create([
            'name' => 'Feature 2'
        ]);
        DashboardFeature::create([
            'name' => 'Feature 3'
        ]);
        DashboardFeature::create([
            'name' => 'Feature 4'
        ]);
        DashboardFeature::create([
            'name' => 'Feature 5'
        ]);
        DashboardFeature::create([
            'name' => 'Feature 6'
        ]);
    }
}
