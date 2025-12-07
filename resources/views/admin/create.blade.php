<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add University - EduGate Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100 min-h-screen pb-20">

    <!-- Navbar -->
    <nav class="bg-emerald-900 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="text-emerald-100 hover:text-white mr-4">
                        &larr; Back
                    </a>
                    <span class="text-white font-bold text-lg">Add New University</span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <form action="{{ route('admin.universities.store') }}" method="POST">
            @csrf
            
            <!-- White Card -->
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="p-8 space-y-8">

                    <!-- Section 1: Basic Info -->
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">University Details</h3>
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">University Name</label>
                                <input type="text" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">City</label>
                                <select name="city" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm">
                                    <option>Islamabad</option>
                                    <option>Lahore</option>
                                    <option>Karachi</option>
                                    <option>Peshawar</option>
                                    <option>Quetta</option>
                                    <option>Multan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Website URL</label>
                                <input type="url" name="website_url" placeholder="https://..." class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Deadlines (Dynamic) -->
                    <div>
                        <div class="flex items-center justify-between border-b pb-2 mb-4">
                            <h3 class="text-lg font-medium text-gray-900">Admission Deadlines</h3>
                            <button type="button" onclick="addDeadline()" class="text-sm text-emerald-600 hover:text-emerald-800 font-medium">+ Add Deadline</button>
                        </div>
                        <div id="deadlines-container" class="space-y-4">
                            <!-- JS will add rows here -->
                        </div>
                    </div>

                    <!-- Section 3: Programs (Dynamic) -->
                    <div>
                        <div class="flex items-center justify-between border-b pb-2 mb-4">
                            <h3 class="text-lg font-medium text-gray-900">Programs</h3>
                            <button type="button" onclick="addProgram()" class="text-sm text-emerald-600 hover:text-emerald-800 font-medium">+ Add Program</button>
                        </div>
                        <div id="programs-container" class="space-y-4">
                            <!-- JS will add rows here -->
                        </div>
                    </div>

                </div>

                <!-- Footer Action -->
                <div class="bg-gray-50 px-8 py-4 flex justify-end">
                    <button type="submit" class="w-full sm:w-auto bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-6 rounded-lg shadow transition-colors">
                        Save University
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- JavaScript for Dynamic Rows -->
    <script>
        let deadlineIndex = 0;
        let programIndex = 0;

        // Add 1 empty row on load
        window.onload = function() {
            addDeadline();
            addProgram();
        };

        function addDeadline() {
            const container = document.getElementById('deadlines-container');
            const html = `
                <div class="flex flex-col sm:flex-row gap-3 items-start bg-gray-50 p-3 rounded-md border border-gray-200">
                    <div class="flex-1">
                        <input type="text" name="deadlines[${deadlineIndex}][title]" placeholder="Title (e.g. Fall 2025)" class="block w-full border-gray-300 rounded-md text-sm p-2 border" required>
                    </div>
                    <div>
                        <input type="date" name="deadlines[${deadlineIndex}][start_date]" class="block w-full border-gray-300 rounded-md text-sm p-2 border" required>
                    </div>
                    <div>
                        <input type="date" name="deadlines[${deadlineIndex}][end_date]" class="block w-full border-gray-300 rounded-md text-sm p-2 border" required>
                    </div>
                    <div>
                        <select name="deadlines[${deadlineIndex}][status]" class="block w-full border-gray-300 rounded-md text-sm p-2 border">
                            <option value="Upcoming">Upcoming</option>
                            <option value="Open">Open</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700 px-2 py-2">
                        &times;
                    </button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
            deadlineIndex++;
        }

        function addProgram() {
            const container = document.getElementById('programs-container');
            const html = `
                <div class="flex flex-col sm:flex-row gap-3 items-start bg-gray-50 p-3 rounded-md border border-gray-200">
                    <div class="w-1/3">
                        <input type="text" name="programs[${programIndex}][name]" placeholder="Program Name" class="block w-full border-gray-300 rounded-md text-sm p-2 border" required>
                    </div>
                    <div class="flex-1">
                        <input type="text" name="programs[${programIndex}][criteria]" placeholder="Criteria (e.g. Min 60%)" class="block w-full border-gray-300 rounded-md text-sm p-2 border" required>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700 px-2 py-2">
                        &times;
                    </button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
            programIndex++;
        }
    </script>

</body>
</html>