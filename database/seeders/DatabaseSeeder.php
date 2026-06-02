<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        User::factory()->create([
            'name' => 'Sr. Admin',
            'email' => 'admin@tmcs.or.tz',
            'password' => bcrypt('password123'),
        ]);

        // Operator user
        User::factory()->create([
            'name' => 'Jane Operator',
            'email' => 'operator@tmcs.or.tz',
            'password' => bcrypt('password123'),
        ]);

        // Viewer user
        User::factory()->create([
            'name' => 'John Viewer',
            'email' => 'viewer@tmcs.or.tz',
            'password' => bcrypt('password123'),
        ]);
    }
}
