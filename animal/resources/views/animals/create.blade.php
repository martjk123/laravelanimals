<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Animal — ZooMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100 font-sans">

<div class="max-w-3xl mx-auto px-4 py-10">

    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-6 flex items-center gap-2">
        <a href="{{ route('animals.index') }}" class="hover:text-emerald-600 transition">Animals</a>
        <span>/</span>
        <span class="text-gray-700 font-medium">Add New</span>
    </div>

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Add Animal</h1>
        <p class="text-sm text-gray-500 mt-1">
            Register a new animal into the zoo system.
        </p>
    </div>

    
    <div class="bg-white border border-gray-200 shadow-sm rounded-2xl p-8">

        <form action="{{ route('animals.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Name -->
                <div class="md:col-span-2">
                    <label class="text-xs font-semibold text-gray-500 uppercase">Animal Name</label>
                    <input type="text" name="name"
                        placeholder="e.g. Lion"
                        class="mt-1 w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50
                               focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition"
                        required>
                </div>

                <!-- Species -->
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase">Species</label>
                    <input type="text" name="species"
                        placeholder="e.g. Panthera leo"
                        class="mt-1 w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50
                               focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition"
                        required>
                </div>

                <!-- Age -->
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase">Age (years)</label>
                    <input type="number" name="age" min="0" max="200"
                        placeholder="e.g. 5"
                        class="mt-1 w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50
                               focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition"
                        required>
                </div>

                <!-- Habitat -->
                <div class="md:col-span-2">
                    <label class="text-xs font-semibold text-gray-500 uppercase">Habitat</label>
                    <input type="text" name="habitat"
                        placeholder="e.g. Savannah"
                        class="mt-1 w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50
                               focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition"
                        required>
                </div>

            </div>

            <!-- Actions -->
            <div class="flex justify-between items-center mt-8 pt-6 border-t">

                <a href="{{ route('animals.index') }}"
                   class="text-gray-600 hover:text-gray-900 text-sm font-medium transition">
                    ← Back to list
                </a>

                <button type="submit"
                    class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2.5 rounded-xl font-semibold shadow-sm transition">
                    Save Animal
                </button>

            </div>

        </form>

    </div>
</div>

</body>
</html>