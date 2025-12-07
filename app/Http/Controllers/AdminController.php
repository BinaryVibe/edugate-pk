<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\AdmissionDeadline;
use App\Models\Program;

class AdminController extends Controller
{
    public function index()
    {
        $universities = University::orderBy('last_updated', 'desc')->paginate(10);
        return view('admin.index', compact('universities'));
    }

    // --- NEW METHODS ---

    /**
     * Show the form for creating a new university.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created university in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate the Input
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'website_url' => 'nullable|url',
            // Arrays for dynamic rows
            'deadlines' => 'nullable|array',
            'programs' => 'nullable|array',
        ]);

        // 2. Create the University
        $university = University::create([
            'name' => $request->name,
            'city' => $request->city,
            'website_url' => $request->website_url,
            'description' => $request->description,
            // We use the current timestamp for last_updated
            'last_updated' => now(),
        ]);

        // 3. Create Deadlines (if any)
        if ($request->has('deadlines')) {
            foreach ($request->deadlines as $deadline) {
                // Skip empty rows
                if (!empty($deadline['title'])) {
                    $university->deadlines()->create([
                        'title' => $deadline['title'],
                        'start_date' => $deadline['start_date'],
                        'end_date' => $deadline['end_date'],
                        'status' => $deadline['status'],
                    ]);
                }
            }
        }

        // 4. Create Programs (if any)
        if ($request->has('programs')) {
            foreach ($request->programs as $program) {
                if (!empty($program['name'])) {
                    $university->programs()->create([
                        'program_name' => $program['name'],
                        'criteria' => $program['criteria'],
                    ]);
                }
            }
        }

        // 5. Redirect back to Dashboard
        return redirect()->route('admin.dashboard')->with('success', 'University added successfully!');
    }
}