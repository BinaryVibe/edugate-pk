<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    /**
     * Display the homepage with the list of universities.
     * Handles Search and City Filtering.
     */
    public function index(Request $request)
    {
        // Start building the query
        $query = University::query();

        // 1. Search Logic: If user typed a name
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // 2. Filter Logic: If user selected a city
        if ($request->has('city') && $request->city != 'All Cities') {
            $query->where('city', $request->city);
        }

        // Execute Query: Get results ordered by latest updates
        $universities = $query->orderBy('last_updated', 'desc')->get();

        // Get unique list of cities for the dropdown filter
        $cities = University::select('city')->distinct()->pluck('city');

        // Return the view with the data
        return view('universities.index', compact('universities', 'cities'));
    }

    /**
     * Display the specific university details.
     */
    public function show(University $university)
    {
        // Placeholder for the next step
        return "Detail page for " . $university->name;
    }
}