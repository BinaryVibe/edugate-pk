<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - EduGate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<!-- Soft Emerald Gradient Background -->
<body class="bg-gradient-to-br from-emerald-100 to-emerald-300 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md">
        <!-- Login Card -->
        <div class="bg-white rounded-xl shadow-xl overflow-hidden">
            
            <!-- Card Header -->
            <div class="bg-emerald-50 py-6 px-8 flex items-center justify-center border-b border-emerald-100">
                <svg class="h-8 w-8 text-emerald-600 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zm0 9l2.5-1.25L12 8.5l-2.5 1.25L12 11zm0 2.5l-5-2.5-5 2.5L12 22l10-8.5-5-2.5-5 2.5z"/>
                </svg>
                <h2 class="text-2xl font-bold text-gray-800">Admin Portal</h2>
            </div>

            <!-- Card Body -->
            <div class="py-10 px-8">
                <div class="text-center mb-8">
                    <p class="text-gray-500">Welcome back! Please sign in to manage data.</p>
                </div>

                <form action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf
                    
                    <!-- Email Input -->
                    <div class="mb-5">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input type="email" name="email" id="email" required autofocus
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all"
                               placeholder="admin@edugate.pk">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" id="password" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all"
                               placeholder="••••••••">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-lg shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                        Login
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Footer -->
        <p class="text-center text-emerald-800 text-sm mt-8 opacity-75">
            &copy; {{ date('Y') }} EduGate Pakistan. Secure Area.
        </p>
    </div>

</body>
</html>