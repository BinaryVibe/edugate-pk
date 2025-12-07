<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;

class AdminController extends Controller
{
    /**
     * Show the Admin Dashboard with the list of universities.
     */
    public function index()
    {
        // Fetch universities, latest updated first
        $universities = University::orderBy('last_updated', 'desc')->paginate(10);
        
        return view('admin.index', compact('universities'));
    }
}