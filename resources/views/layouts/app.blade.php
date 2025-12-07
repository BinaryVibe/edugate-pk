<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGate Pakistan</title>
    <!-- Tailwind CSS (Using CDN for fast setup) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

    <!-- Navigation -->
    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center gap-2">
                        <svg class="h-8 w-8 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zm0 9l2.5-1.25L12 8.5l-2.5 1.25L12 11zm0 2.5l-5-2.5-5 2.5L12 22l10-8.5-5-2.5-5 2.5z"/>
                        </svg>
                        <span class="font-bold text-xl tracking-tight text-gray-900">EduGate <span class="text-emerald-600">Pakistan</span></span>
                    </a>
                </div>
                
                <!-- NEW: Navigation Links -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" class="text-gray-500 hover:text-emerald-600 px-3 py-2 rounded-md text-sm font-medium">
                        Home
                    </a>
                    
                    @auth
                        <!-- If logged in, show Dashboard link -->
                        <a href="{{ route('admin.dashboard') }}" class="bg-emerald-100 text-emerald-700 hover:bg-emerald-200 px-4 py-2 rounded-md text-sm font-medium">
                            Admin Dashboard
                        </a>
                    @else
                        <!-- If not logged in, show Login link -->
                        <a href="{{ route('admin.login') }}" class="bg-emerald-600 text-white hover:bg-emerald-700 px-4 py-2 rounded-md text-sm font-medium shadow-sm">
                            Admin Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-gray-400">&copy; {{ date('Y') }} EduGate Pakistan. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>