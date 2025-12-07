@extends('layouts.app')

@section('content')
<!-- Header Section -->
<div class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex items-center">
                <!-- Large Logo Placeholder -->
                <div class="h-20 w-20 rounded-lg bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold text-3xl shadow-sm">
                    {{ substr($university->name, 0, 1) }}
                </div>
                <div class="ml-5">
                    <h1 class="text-3xl font-bold text-gray-900 leading-tight">
                        {{ $university->name }}
                    </h1>
                    <div class="mt-1 flex items-center text-sm text-gray-500">
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ $university->city }}
                        <span class="mx-2">&bull;</span>
                        Last Updated: {{ \Carbon\Carbon::parse($university->last_updated)->format('M d, Y') }}
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="mt-8 flex flex-wrap gap-4">
            <a href="{{ $university->website_url }}" target="_blank" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-emerald-600 hover:bg-emerald-700">
                Official Website
            </a>
            <a href="#" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-emerald-700 bg-emerald-100 hover:bg-emerald-200">
                Admissions Portal
            </a>
            <a href="#" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-emerald-700 bg-emerald-100 hover:bg-emerald-200">
                Fee Structure
            </a>
        </div>
    </div>
</div>

<!-- Main Content (2 Columns) -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left Column: Deadlines & Programs (Span 2) -->
        <div class="lg:col-span-2 space-y-10">
            
            <!-- Deadlines Section -->
            <div class="bg-white shadow rounded-lg overflow-hidden border border-gray-100">
                <div class="px-6 py-5 border-b border-gray-100 bg-gray-50">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Admission Deadlines</h3>
                </div>
                <div class="px-6 py-5">
                    @if($university->deadlines->count() > 0)
                        <div class="flow-root">
                            <ul role="list" class="-my-5 divide-y divide-gray-200">
                                @foreach($university->deadlines as $deadline)
                                <li class="py-5">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm font-semibold text-gray-800">{{ $deadline->title }}</p>
                                            <p class="text-sm text-gray-500">
                                                Start: {{ \Carbon\Carbon::parse($deadline->start_date)->format('M d') }} &mdash; 
                                                End: {{ \Carbon\Carbon::parse($deadline->end_date)->format('M d, Y') }}
                                            </p>
                                        </div>
                                        <div>
                                            @if($deadline->status == 'Open')
                                                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                                    Open
                                                </span>
                                            @elseif($deadline->status == 'Upcoming')
                                                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                                    Upcoming
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                                    Closed
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <p class="text-gray-500 italic">No upcoming deadlines found.</p>
                    @endif
                </div>
            </div>

            <!-- Programs Section -->
            <div class="bg-white shadow rounded-lg overflow-hidden border border-gray-100">
                <div class="px-6 py-5 border-b border-gray-100 bg-gray-50">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Programs Offered</h3>
                </div>
                <div class="border-t border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Program Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Eligibility Criteria</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($university->programs as $program)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $program->program_name }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $program->criteria }}
                                </td>
                            </tr>
                            @endforeach
                            @if($university->programs->count() == 0)
                                <tr>
                                    <td colspan="2" class="px-6 py-4 text-sm text-gray-500 italic text-center">No programs listed yet.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Right Column: Sidebar (Span 1) -->
        <div class="space-y-8">
            <!-- About Section -->
            <div class="bg-white shadow rounded-lg p-6 border border-gray-100">
                <h3 class="text-lg font-medium text-gray-900 mb-4">About University</h3>
                <p class="text-gray-600 leading-relaxed text-sm">
                    {{ $university->description }}
                </p>
            </div>

            <!-- Location Section (Static Placeholder) -->
            <div class="bg-white shadow rounded-lg p-6 border border-gray-100">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Location</h3>
                <div class="bg-gray-200 rounded-lg h-48 w-full flex items-center justify-center text-gray-500 text-sm">
                    <div class="text-center">
                        <svg class="mx-auto h-8 w-8 text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Map Unavailable
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection