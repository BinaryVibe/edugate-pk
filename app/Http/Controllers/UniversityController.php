<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index(Request $request)
    {
        $query = University::query();

        // Search by Name
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by City
        if ($request->has('city') && $request->city != 'All Cities') {
            $query->where('city', $request->city);
        }

        $universities = $query->orderBy('last_updated', 'desc')->get();
        $cities = University::select('city')->distinct()->pluck('city');

        return view('universities.index', compact('universities', 'cities'));
    }

    // --- UPDATED METHOD ---
    public function show(University $university)
    {
        // Load the related deadlines and programs for this university
        $university->load(['deadlines', 'programs']);

        return view('universities.show', compact('university'));
    }
}