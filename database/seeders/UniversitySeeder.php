<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\University;

class UniversitySeeder extends Seeder
{
    public function run(): void
    {
        $universities = [
            [
                'name' => 'National University of Sciences & Technology (NUST)',
                'city' => 'Islamabad',
                'website_url' => 'https://nust.edu.pk',
                'description' => 'A premier public research university known for its engineering and IT programs.',
            ],
            [
                'name' => 'Lahore University of Management Sciences (LUMS)',
                'city' => 'Lahore',
                'website_url' => 'https://lums.edu.pk',
                'description' => 'A world-class academic institution with a proud history of achievement.',
            ],
            [
                'name' => 'FAST NUCES',
                'city' => 'Karachi',
                'website_url' => 'http://nu.edu.pk',
                'description' => 'The first multi-campus university in Pakistan, famous for Computer Science.',
            ],
            [
                'name' => 'University of Engineering and Technology (UET)',
                'city' => 'Lahore',
                'website_url' => 'https://uet.edu.pk',
                'description' => 'One of the oldest and most prestigious engineering institutions in Pakistan.',
            ]
        ];

        foreach ($universities as $uni) {
            University::create($uni);
        }
    }
}