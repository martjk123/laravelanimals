<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Animal — ZooMS</title>
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
        <span class="text-gray-700 font-medium">{{ $animal->name }}</span>
        <span>/</span>
        <span class="text-gray-400">Edit</span>
    </div>

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-green-700">Edit Animal</h1>
        <p class="text-gray-500 text-sm mt-1">
            Update details for <span class="font-semibold text-gray-700">{{ $animal->name }}</span>
        </p>
    </div>

    <!-- Error Box -->
    @if ($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-600 p-4 rounded-xl">
            <p class="font-semibold mb-2">Please fix the following:</p>
            <ul class="list-disc ml-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- FORM CARD -->
    <div class="bg-white border border-gray-200 shadow-sm rounded-2xl p-8">

        <form action="{{ route('animals.update', $animal) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Name -->
                <div class="md:col-span-2">
                    <label class="text-xs font-semibold text-gray-500 uppercase">Animal Name</label>
                    <input type="text" name="name"
                        value="{{ old('name', $animal->name) }}"
                        class="mt-1 w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50
                               focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition"
                        required>
                </div>

                <!-- Species -->
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase">Species</label>
                    <input type="text" name="species"
                        value="{{ old('species', $animal->species) }}"
                        class="mt-1 w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50
                               focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition"
                        required>
                </div>

                <!-- Age -->
                <div>
                    <label class="text-xs font-semibold text-gray-500 uppercase">Age (years)</label>
                    <input type="number" name="age" min="0" max="200"
                        value="{{ old('age', $animal->age) }}"
                        class="mt-1 w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50
                               focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition"
                        required>
                </div>

                <!-- Habitat -->
                <div class="md:col-span-2">
                    <label class="text-xs font-semibold text-gray-500 uppercase">Habitat</label>
                    <input type="text" name="habitat"
                        value="{{ old('habitat', $animal->habitat) }}"
                        class="mt-1 w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50
                               focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition"
                        required>
                </div>

            </div>

            <!-- Actions -->
            <div class="flex justify-between items-center mt-8 pt-6 border-t">

                <a href="{{ route('animals.index') }}"
                   class="text-gray-600 hover:text-gray-900 text-sm font-medium transition">
                    ← Back
                </a>

                <div class="flex gap-3">
                    <button type="submit"
                        class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2.5 rounded-xl font-semibold shadow-sm transition">
                        Save Changes
                    </button>
                </div>

            </div>

        </form>

    </div>
</div>

</body>
</html>