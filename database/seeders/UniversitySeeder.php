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
        // Data Array of 25 Top Pakistani Universities
        $universities = [
            [
                'name' => 'National University of Sciences & Technology (NUST)',
                'city' => 'Islamabad',
                'website_url' => 'https://nust.edu.pk',
                'description' => 'Pakistan’s #1 engineering and technology university, known for its rigorous NET exam and sprawling H-12 campus.',
                'programs' => [
                    ['BS Computer Science', 'NET Score > 150 (approx 75% aggregate)'],
                    ['BS Software Engineering', 'NET Score > 145'],
                    ['BS Architecture', 'NET + Interview'],
                    ['BBA', 'NET (Business/Social Sciences)']
                ]
            ],
            [
                'name' => 'Lahore University of Management Sciences (LUMS)',
                'city' => 'Lahore',
                'website_url' => 'https://lums.edu.pk',
                'description' => 'A world-class liberal arts and business university. Highly competitive admissions based on SAT/LCAT and holistic profiles.',
                'programs' => [
                    ['BSc (Honours) Computer Science', 'SAT I (1350+) + Scientific Aptitude Test'],
                    ['BSc (Honours) Economics', 'SAT I + Internal Test'],
                    ['BA (Honours) English', 'SAT I + LCAT'],
                    ['BBA (Honours)', 'SAT I + Strong Extracurriculars']
                ]
            ],
            [
                'name' => 'Ghulam Ishaq Khan Institute (GIKI)',
                'city' => 'Topi',
                'website_url' => 'https://giki.edu.pk',
                'description' => 'Prestigious engineering institute located in Swabi district. Famous for its Computer Science and Engineering programs.',
                'programs' => [
                    ['BS Computer Science', 'GIKI Entry Test (Top 150 merit)'],
                    ['BS Mechanical Engineering', 'GIKI Entry Test'],
                    ['BS Artificial Intelligence', 'GIKI Entry Test']
                ]
            ],
            [
                'name' => 'FAST NUCES',
                'city' => 'Islamabad', // Also has campuses in LHR, KHI, PWR, CFD
                'website_url' => 'http://nu.edu.pk',
                'description' => 'The premier institute for Computer Science in Pakistan. Known for its tough curriculum and high employability.',
                'programs' => [
                    ['BS Computer Science', 'NU Test (60% weightage) + Inter (40%)'],
                    ['BS Data Science', 'NU Test'],
                    ['BS Cyber Security', 'NU Test']
                ]
            ],
            [
                'name' => 'Institute of Business Administration (IBA)',
                'city' => 'Karachi',
                'website_url' => 'https://www.iba.edu.pk',
                'description' => 'The oldest and most prestigious business school in Pakistan, offering top-tier BBA and CS programs.',
                'programs' => [
                    ['BBA', 'SAT (1270+) or IBA Test'],
                    ['BS Computer Science', 'SAT (1270+) or IBA Test (Math based)'],
                    ['BS Accounting & Finance', 'IBA Test']
                ]
            ],
            [
                'name' => 'Pakistan Institute of Engineering and Applied Sciences (PIEAS)',
                'city' => 'Islamabad',
                'website_url' => 'http://pieas.edu.pk',
                'description' => 'Specialized in Nuclear Engineering and Computer Science. Often ranked #1 by HEC for engineering.',
                'programs' => [
                    ['BS Electrical Engineering', 'PIEAS Entry Test (60%)'],
                    ['BS Computer Science', 'PIEAS Entry Test'],
                    ['BS Mechanical Engineering', 'PIEAS Entry Test']
                ]
            ],
            [
                'name' => 'Quaid-i-Azam University (QAU)',
                'city' => 'Islamabad',
                'website_url' => 'https://qau.edu.pk',
                'description' => 'A top-ranked public research university, famous for Natural Sciences and Social Sciences.',
                'programs' => [
                    ['BS Physics', 'Intermediate Marks (Merit based)'],
                    ['BS Economics', 'Intermediate Marks'],
                    ['BS International Relations', 'Intermediate Marks']
                ]
            ],
            [
                'name' => 'University of Engineering and Technology (UET)',
                'city' => 'Lahore',
                'website_url' => 'https://uet.edu.pk',
                'description' => 'One of the oldest engineering institutions in Pakistan. Requires the ECAT exam for admission.',
                'programs' => [
                    ['BSc Civil Engineering', 'ECAT + FSc (High Merit)'],
                    ['BSc Electrical Engineering', 'ECAT + FSc'],
                    ['BSc Computer Science', 'ECAT + FSc']
                ]
            ],
            [
                'name' => 'COMSATS University (CUI)',
                'city' => 'Islamabad',
                'website_url' => 'https://www.comsats.edu.pk',
                'description' => 'A major public sector university with a strong focus on Information Technology and Computer Science.',
                'programs' => [
                    ['BS Computer Science', 'NTS NAT-IE Test (50%) + Inter (50%)'],
                    ['BS Software Engineering', 'NTS NAT-IE Test'],
                    ['BS Physics', 'NTS NAT Test']
                ]
            ],
            [
                'name' => 'NED University of Engineering & Technology',
                'city' => 'Karachi',
                'website_url' => 'https://www.neduet.edu.pk',
                'description' => 'Karachi’s flagship engineering university.',
                'programs' => [
                    ['BE Civil Engineering', 'NED Entry Test + Inter'],
                    ['BS Computer Science', 'NED Entry Test + Inter (Pre-Eng/ICS)']
                ]
            ],
            [
                'name' => 'Information Technology University (ITU)',
                'city' => 'Lahore',
                'website_url' => 'https://itu.edu.pk',
                'description' => 'A specialized tech university located in Arfa Software Technology Park, focused on solving local problems.',
                'programs' => [
                    ['BS Computer Science', 'ITU Admissions Test'],
                    ['BS Management & Technology', 'ITU Admissions Test']
                ]
            ],
            [
                'name' => 'University of Lahore (UOL)',
                'city' => 'Lahore',
                'website_url' => 'https://uol.edu.pk',
                'description' => 'One of the largest private sector universities with diverse departments including Medical and Engineering.',
                'programs' => [
                    ['Doctor of Physical Therapy (DPT)', 'Inter Pre-Medical (60%+)'],
                    ['BS Computer Science', 'Inter 50%+'],
                    ['Pharm-D', 'Inter Pre-Medical']
                ]
            ],
            [
                'name' => 'Bahria University',
                'city' => 'Islamabad',
                'website_url' => 'https://bahria.edu.pk',
                'description' => 'Established by the Pakistan Navy, offering strong programs in Management, CS, and Psychology.',
                'programs' => [
                    ['BS Psychology', 'Bahria Entry Test'],
                    ['BBA', 'Bahria Entry Test'],
                    ['BS Computer Science', 'Bahria Entry Test (Maths)']
                ]
            ],
            [
                'name' => 'Air University',
                'city' => 'Islamabad',
                'website_url' => 'https://au.edu.pk',
                'description' => 'Federally chartered public sector university founded by the Pakistan Air Force. Strong in Aviation and CS.',
                'programs' => [
                    ['BS Cyber Security', 'AU Entry Test (Computer based)'],
                    ['BS Aviation Management', 'AU Entry Test'],
                    ['BE Mechatronics', 'AU Entry Test']
                ]
            ],
            [
                'name' => 'Aga Khan University (AKU)',
                'city' => 'Karachi',
                'website_url' => 'https://www.aku.edu',
                'description' => 'An international university, renowned globally for its Medical College and Hospital.',
                'programs' => [
                    ['MBBS', 'AKU Entry Test + Biology/Chem Inter'],
                    ['BSc Nursing', 'AKU Entry Test']
                ]
            ],
            [
                'name' => 'Szabist',
                'city' => 'Karachi',
                'website_url' => 'https://szabist.edu.pk',
                'description' => 'Shaheed Zulfikar Ali Bhutto Institute of Science and Technology, known for Media and Management Sciences.',
                'programs' => [
                    ['BS Media Sciences', 'Szabist Test + Interview'],
                    ['BBA', 'Szabist Test']
                ]
            ],
            [
                'name' => 'University of Central Punjab (UCP)',
                'city' => 'Lahore',
                'website_url' => 'https://ucp.edu.pk',
                'description' => 'A project of the Punjab Group of Colleges, known for its Media and Business schools.',
                'programs' => [
                    ['BS Media & Communication', 'Inter 45%'],
                    ['BS Computer Science', 'Inter 50%']
                ]
            ],
            [
                'name' => 'Beaconhouse National University (BNU)',
                'city' => 'Lahore',
                'website_url' => 'https://www.bnu.edu.pk',
                'description' => 'The first Liberal Arts university in Pakistan, famous for Architecture, Design, and Psychology.',
                'programs' => [
                    ['B.Arch (Architecture)', 'Portfolio + Interview + Admission Test'],
                    ['BS Psychology', 'Admission Test + Interview']
                ]
            ],
            [
                'name' => 'Dow University of Health Sciences (DUHS)',
                'city' => 'Karachi',
                'website_url' => 'https://www.duhs.edu.pk',
                'description' => 'One of the most prestigious public medical universities in Pakistan.',
                'programs' => [
                    ['MBBS', 'MDCAT + Inter Pre-Medical'],
                    ['BDS', 'MDCAT + Inter Pre-Medical']
                ]
            ],
            [
                'name' => 'King Edward Medical University (KEMU)',
                'city' => 'Lahore',
                'website_url' => 'https://kemu.edu.pk',
                'description' => 'The oldest medical school in Pakistan. Extremely high merit.',
                'programs' => [
                    ['MBBS', 'MDCAT (Top Merit in Punjab)'],
                    ['BSc Allied Health', 'MDCAT + Inter']
                ]
            ],
            [
                'name' => 'International Islamic University (IIUI)',
                'city' => 'Islamabad',
                'website_url' => 'https://www.iiu.edu.pk',
                'description' => 'A large public university known for Islamic studies, Law, and Engineering.',
                'programs' => [
                    ['LLB (Hons)', 'LAT Test + IIUI Test'],
                    ['BS Economics', 'IIUI Entry Test']
                ]
            ],
            [
                'name' => 'University of Peshawar',
                'city' => 'Peshawar',
                'website_url' => 'http://www.uop.edu.pk',
                'description' => 'The oldest university in KPK, offering a wide array of programs.',
                'programs' => [
                    ['BS Geology', 'Inter Science'],
                    ['BS Computer Science', 'ETEA Test + Inter']
                ]
            ],
            [
                'name' => 'Mehran University (MUET)',
                'city' => 'Jamshoro',
                'website_url' => 'https://www.muet.edu.pk',
                'description' => 'A leading public engineering university in Sindh.',
                'programs' => [
                    ['BE Civil Engineering', 'Pre-Admission Test'],
                    ['BE Software Engineering', 'Pre-Admission Test']
                ]
            ],
            [
                'name' => 'Institute of Space Technology (IST)',
                'city' => 'Islamabad',
                'website_url' => 'https://www.ist.edu.pk',
                'description' => 'Focused on Astronomy, Aerospace, and Avionics engineering.',
                'programs' => [
                    ['BS Aerospace Engineering', 'NAT-IE / IST Test'],
                    ['BS Avionics Engineering', 'NAT-IE / IST Test']
                ]
            ],
            [
                'name' => 'National Textile University (NTU)',
                'city' => 'Faisalabad',
                'website_url' => 'https://ntu.edu.pk',
                'description' => 'The premier institute for Textile Engineering and Design in Pakistan.',
                'programs' => [
                    ['BS Textile Engineering', 'NTU Entry Test'],
                    ['BS Fashion Design', 'Drawing Test + Interview']
                ]
            ],
        ];

        // --- Loop to Insert Data ---
        foreach ($universities as $uniData) {
            
            // 1. Create University
            $university = University::create([
                'name' => $uniData['name'],
                'city' => $uniData['city'],
                'website_url' => $uniData['website_url'],
                'description' => $uniData['description'],
            ]);

            // 2. Add Dummy Programs (from the array above)
            foreach ($uniData['programs'] as $prog) {
                Program::create([
                    'university_id' => $university->id,
                    'program_name' => $prog[0],
                    'criteria' => $prog[1]
                ]);
            }

            // 3. Add a Dummy Deadline (Randomized slightly for realism)
            $statuses = ['Open', 'Upcoming', 'Closed'];
            $status = $statuses[array_rand($statuses)];
            
            // If status is Open, dates should be current
            if($status == 'Open') {
                $start = now()->subDays(10);
                $end = now()->addDays(20);
                $title = 'Spring 2026 Admissions';
            } elseif ($status == 'Upcoming') {
                $start = now()->addDays(30);
                $end = now()->addDays(60);
                $title = 'Fall 2026 Undergraduate';
            } else {
                $start = now()->subMonths(2);
                $end = now()->subMonths(1);
                $title = 'Fall 2025 (Closed)';
            }

            AdmissionDeadline::create([
                'university_id' => $university->id,
                'title' => $title,
                'start_date' => $start,
                'end_date' => $end,
                'status' => $status
            ]);
        }
    }
}