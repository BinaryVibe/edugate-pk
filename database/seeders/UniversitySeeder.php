<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\University;
use App\Models\AdmissionDeadline;
use App\Models\Program;

class UniversitySeeder extends Seeder
{
    public function run(): void
    {
        // 1. NUST
        $nust = University::create([
            'name' => 'National University of Sciences & Technology (NUST)',
            'city' => 'Islamabad',
            'website_url' => 'https://nust.edu.pk',
            'description' => 'A premier public research university known for its engineering and IT programs. NUST offers a wide range of undergraduate and graduate programs.',
        ]);

        AdmissionDeadline::create([
            'university_id' => $nust->id,
            'title' => 'Fall 2025 Undergraduate',
            'start_date' => '2025-06-01',
            'end_date' => '2025-07-15',
            'status' => 'Upcoming'
        ]);

        Program::create(['university_id' => $nust->id, 'program_name' => 'BS Computer Science', 'criteria' => 'Min 60% in FSc Pre-Engineering']);
        Program::create(['university_id' => $nust->id, 'program_name' => 'BS Software Engineering', 'criteria' => 'Min 60% in FSc Pre-Engineering']);

        // 2. LUMS
        $lums = University::create([
            'name' => 'Lahore University of Management Sciences (LUMS)',
            'city' => 'Lahore',
            'website_url' => 'https://lums.edu.pk',
            'description' => 'A world-class academic institution with a proud history of achievement and ambitious plans for the future.',
        ]);

        AdmissionDeadline::create([
            'university_id' => $lums->id,
            'title' => 'Fall 2025 Admissions',
            'start_date' => '2024-11-01',
            'end_date' => '2025-02-02',
            'status' => 'Open'
        ]);

        Program::create(['university_id' => $lums->id, 'program_name' => 'BSc (Honours)', 'criteria' => 'Average 2Bs and 1C in A-Levels']);
        
        // Add other universities if needed...
    }
}