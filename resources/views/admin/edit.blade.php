<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit University - EduGate Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100 min-h-screen pb-20">

    <nav class="bg-emerald-900 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="text-emerald-100 hover:text-white mr-4">&larr; Back</a>
                    <span class="text-white font-bold text-lg">Edit University</span>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <form action="{{ route('admin.universities.update', $university->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="p-8 space-y-8">

                    <!-- Basic Info -->
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">University Details</h3>
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">University Name</label>
                                <input type="text" name="name" value="{{ $university->name }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">City</label>
                                <select name="city" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
                                    @foreach(['Islamabad', 'Lahore', 'Karachi', 'Peshawar', 'Quetta', 'Multan'] as $city)
                                        <option value="{{ $city }}" {{ $university->city == $city ? 'selected' : '' }}>{{ $city }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Website URL</label>
                                <input type="text" name="website_url" value="{{ $university->website_url }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">{{ $university->description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Deadlines -->
                    <div>
                        <div class="flex items-center justify-between border-b pb-2 mb-4">
                            <h3 class="text-lg font-medium text-gray-900">Admission Deadlines</h3>
                            <button type="button" onclick="addDeadline()" class="text-sm text-emerald-600 font-medium">+ Add Deadline</button>
                        </div>
                        <div id="deadlines-container" class="space-y-4">
                            @foreach($university->deadlines as $index => $deadline)
                            <div class="flex flex-col sm:flex-row gap-3 items-start bg-gray-50 p-3 rounded-md border border-gray-200">
                                <div class="flex-1"><input type="text" name="deadlines[{{$index}}][title]" value="{{ $deadline->title }}" class="block w-full border-gray-300 rounded-md text-sm p-2 border" required></div>
                                <div><input type="date" name="deadlines[{{$index}}][start_date]" value="{{ $deadline->start_date }}" class="block w-full border-gray-300 rounded-md text-sm p-2 border" required></div>
                                <div><input type="date" name="deadlines[{{$index}}][end_date]" value="{{ $deadline->end_date }}" class="block w-full border-gray-300 rounded-md text-sm p-2 border" required></div>
                                <div>
                                    <select name="deadlines[{{$index}}][status]" class="block w-full border-gray-300 rounded-md text-sm p-2 border">
                                        <option value="Upcoming" {{ $deadline->status == 'Upcoming' ? 'selected' : '' }}>Upcoming</option>
                                        <option value="Open" {{ $deadline->status == 'Open' ? 'selected' : '' }}>Open</option>
                                        <option value="Closed" {{ $deadline->status == 'Closed' ? 'selected' : '' }}>Closed</option>
                                    </select>
                                </div>
                                <button type="button" onclick="this.parentElement.remove()" class="text-red-500 px-2 py-2">&times;</button>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Programs -->
                    <div>
                        <div class="flex items-center justify-between border-b pb-2 mb-4">
                            <h3 class="text-lg font-medium text-gray-900">Programs</h3>
                            <button type="button" onclick="addProgram()" class="text-sm text-emerald-600 font-medium">+ Add Program</button>
                        </div>
                        <div id="programs-container" class="space-y-4">
                            @foreach($university->programs as $index => $program)
                            <div class="flex flex-col sm:flex-row gap-3 items-start bg-gray-50 p-3 rounded-md border border-gray-200">
                                <div class="w-1/3"><input type="text" name="programs[{{$index}}][name]" value="{{ $program->program_name }}" class="block w-full border-gray-300 rounded-md text-sm p-2 border" required></div>
                                <div class="flex-1"><input type="text" name="programs[{{$index}}][criteria]" value="{{ $program->criteria }}" class="block w-full border-gray-300 rounded-md text-sm p-2 border" required></div>
                                <button type="button" onclick="this.parentElement.remove()" class="text-red-500 px-2 py-2">&times;</button>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="bg-gray-50 px-8 py-4 flex justify-end">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-6 rounded-lg shadow">Update University</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Reusing the same JS logic from Create, but initializing index to avoid conflicts -->
    <script>
        // Start index after existing items to avoid overwriting inputs
        let deadlineIndex = {{ $university->deadlines->count() + 1 }};
        let programIndex = {{ $university->programs->count() + 1 }};

        function addDeadline() {
            // Same JS function as Create Page
            const container = document.getElementById('deadlines-container');
            const html = `<div class="flex flex-col sm:flex-row gap-3 items-start bg-gray-50 p-3 rounded-md border border-gray-200"><div class="flex-1"><input type="text" name="deadlines[${deadlineIndex}][title]" placeholder="Title" class="block w-full border-gray-300 rounded-md text-sm p-2 border" required></div><div><input type="date" name="deadlines[${deadlineIndex}][start_date]" class="block w-full border-gray-300 rounded-md text-sm p-2 border" required></div><div><input type="date" name="deadlines[${deadlineIndex}][end_date]" class="block w-full border-gray-300 rounded-md text-sm p-2 border" required></div><div><select name="deadlines[${deadlineIndex}][status]" class="block w-full border-gray-300 rounded-md text-sm p-2 border"><option value="Upcoming">Upcoming</option><option value="Open">Open</option><option value="Closed">Closed</option></select></div><button type="button" onclick="this.parentElement.remove()" class="text-red-500 px-2 py-2">&times;</button></div>`;
            container.insertAdjacentHTML('beforeend', html);
            deadlineIndex++;
        }

        function addProgram() {
            // Same JS function as Create Page
            const container = document.getElementById('programs-container');
            const html = `<div class="flex flex-col sm:flex-row gap-3 items-start bg-gray-50 p-3 rounded-md border border-gray-200"><div class="w-1/3"><input type="text" name="programs[${programIndex}][name]" placeholder="Name" class="block w-full border-gray-300 rounded-md text-sm p-2 border" required></div><div class="flex-1"><input type="text" name="programs[${programIndex}][criteria]" placeholder="Criteria" class="block w-full border-gray-300 rounded-md text-sm p-2 border" required></div><button type="button" onclick="this.parentElement.remove()" class="text-red-500 px-2 py-2">&times;</button></div>`;
            container.insertAdjacentHTML('beforeend', html);
            programIndex++;
        }
    </script>
</body>
</html>