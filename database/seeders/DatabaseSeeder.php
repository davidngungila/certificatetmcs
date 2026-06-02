<?php

namespace Database\Seeders;

use App\Models\Member;
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
        if(!User::where('email', 'admin@tmcs.or.tz')->exists()) {
            User::factory()->create([
                'name' => 'Sr. Admin',
                'email' => 'admin@tmcs.or.tz',
                'password' => bcrypt('password123'),
            ]);
        }

        // Operator user
        if(!User::where('email', 'operator@tmcs.or.tz')->exists()) {
            User::factory()->create([
                'name' => 'Jane Operator',
                'email' => 'operator@tmcs.or.tz',
                'password' => bcrypt('password123'),
            ]);
        }

        // Viewer user
        if(!User::where('email', 'viewer@tmcs.or.tz')->exists()) {
            User::factory()->create([
                'name' => 'John Viewer',
                'email' => 'viewer@tmcs.or.tz',
                'password' => bcrypt('password123'),
            ]);
        }
        
        // Sample members
        $sampleMembers = [
            [
                'name' => 'Amina Juma',
                'email' => 'amina.juma@udsm.ac.tz',
                'student_id' => '2022-04-01234',
                'university' => 'UDSM',
                'category' => 'Leadership',
                'joined_at' => '2024-01-12'
            ],
            [
                'name' => 'Kelvin David',
                'email' => 'kelvin.david@muce.ac.tz',
                'student_id' => '2023-01-05678',
                'university' => 'MUCE',
                'category' => 'Student Member',
                'joined_at' => '2025-03-05'
            ],
            [
                'name' => 'Sarah Mushi',
                'email' => 'sarah.mushi@sua.ac.tz',
                'student_id' => '2021-08-09012',
                'university' => 'SUA',
                'category' => 'Alumni',
                'joined_at' => '2023-09-18'
            ],
            [
                'name' => 'John Nyerere',
                'email' => 'john.nyerere@ifm.ac.tz',
                'student_id' => '2020-03-03456',
                'university' => 'IFM',
                'category' => 'Student Member',
                'joined_at' => '2023-06-22'
            ]
        ];
        
        foreach ($sampleMembers as $memberData) {
            if (!Member::where('email', $memberData['email'])->exists()) {
                Member::create($memberData);
            }
        }
    }
}
