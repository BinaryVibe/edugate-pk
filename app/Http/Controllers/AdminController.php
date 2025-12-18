<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $universities = University::orderBy('last_updated', 'desc')->paginate(10);
        return view('admin.index', compact('universities'));
    }

    // --- UNIVERSITY MANAGEMENT ---

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'website_url' => 'nullable|string', // Changed to string to allow fixing
            'deadlines' => 'nullable|array',
            'programs' => 'nullable|array',
        ]);

        // FIX: Automatically add https:// if missing
        $url = $request->website_url;
        if ($url && !Str::startsWith($url, ['http://', 'https://'])) {
            $url = 'https://' . $url;
        }

        $university = University::create([
            'name' => $request->name,
            'city' => $request->city,
            'website_url' => $url, // Use fixed URL
            'description' => $request->description,
            'last_updated' => now(),
        ]);

        $this->saveRelationships($university, $request);

        return redirect()->route('admin.dashboard')->with('success', 'University added successfully!');
    }

    public function edit($id)
    {
        $university = University::with(['deadlines', 'programs'])->findOrFail($id);
        return view('admin.edit', compact('university'));
    }

    public function update(Request $request, $id)
    {
        $university = University::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'website_url' => 'nullable|string',
            'deadlines' => 'nullable|array',
            'programs' => 'nullable|array',
        ]);

        // FIX: Automatically add https:// if missing
        $url = $request->website_url;
        if ($url && !Str::startsWith($url, ['http://', 'https://'])) {
            $url = 'https://' . $url;
        }

        $university->update([
            'name' => $request->name,
            'city' => $request->city,
            'website_url' => $url, // Use fixed URL
            'description' => $request->description,
            'last_updated' => now(),
        ]);

        // Sync Deadlines & Programs (Delete old, create new)
        $university->deadlines()->delete();
        $university->programs()->delete();
        $this->saveRelationships($university, $request);

        return redirect()->route('admin.dashboard')->with('success', 'University updated successfully!');
    }

    public function destroy($id)
    {
        $university = University::findOrFail($id);
        $university->delete();
        return redirect()->route('admin.dashboard')->with('success', 'University deleted successfully!');
    }

    // Helper to save deadlines/programs to avoid duplicate code
    private function saveRelationships($university, $request)
    {
        if ($request->has('deadlines')) {
            foreach ($request->deadlines as $deadline) {
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
    }

    // --- NEW: ADMIN ACCOUNT MANAGEMENT ---

    public function createAdmin()
    {
        return view('admin.create-admin');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'New Admin Account Created!');
    }
}