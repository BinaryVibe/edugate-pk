@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="bg-emerald-600">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold text-white sm:text-5xl sm:tracking-tight lg:text-6xl">
            Find Your Future University.
        </h1>
        <p class="mt-4 max-w-2xl mx-auto text-xl text-emerald-100">
            All deadlines, programs, and criteria in one place.
        </p>
    </div>
</div>

<!-- Search Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8">
    <div class="bg-white rounded-lg shadow-lg p-6 relative z-10">
        <form action="{{ route('home') }}" method="GET" class="grid grid-cols-1 gap-4 md:grid-cols-12">
            <!-- Search Input -->
            <div class="md:col-span-8">
                <label for="search" class="sr-only">Search University</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" name="search" id="search" 
                           class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm" 
                           placeholder="Search by university name..." value="{{ request('search') }}">
                </div>
            </div>

            <!-- City Filter -->
            <div class="md:col-span-3">
                <label for="city" class="sr-only">City</label>
                <select id="city" name="city" class="block w-full pl-3 pr-10 py-3 text-base border-gray-300 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm rounded-md">
                    <option>All Cities</option>
                    @foreach($cities as $city)
                        <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>{{ $city }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <div class="md:col-span-1">
                <button type="submit" class="w-full flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                    Search
                </button>
            </div>
        </form>
    </div>
</div>

<!-- University Grid -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Featured Universities</h2>
    
    @if($universities->count() > 0)
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($universities as $uni)
                <a href="{{ route('universities.show', $uni->id) }}" class="group block bg-white rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-200 border border-gray-100 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <!-- Logo Placeholder (We'll use a generic icon if no logo exists) -->
                            <div class="h-12 w-12 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-bold text-xl">
                                {{ substr($uni->name, 0, 1) }}
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                {{ $uni->city }}
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-emerald-600 transition-colors">
                            {{ $uni->name }}
                        </h3>
                        <p class="mt-2 text-sm text-gray-500 line-clamp-2">
                            {{ $uni->description }}
                        </p>
                    </div>
                    <div class="bg-gray-50 px-6 py-3 border-t border-gray-100">
                        <span class="text-xs font-medium text-gray-500">
                            Last Updated: {{ \Carbon\Carbon::parse($uni->last_updated)->format('M d, Y') }}
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg">No universities found matching your search.</p>
            <a href="{{ route('home') }}" class="text-emerald-600 hover:underline mt-2 inline-block">Clear Filters</a>
        </div>
    @endif
</div>
@endsection