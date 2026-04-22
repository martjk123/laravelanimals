<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Animal Details — ZooMS</title>
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

<div class="max-w-4xl mx-auto px-4 py-10">

    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-6 flex items-center gap-2">
        <a href="{{ route('animals.index') }}" class="hover:text-emerald-600 transition">Animals</a>
        <span>/</span>
        <span class="text-gray-700 font-medium">{{ $animal->name }}</span>
    </div>

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>
            <h1 class="text-3xl font-bold text-green-700">Animal Details</h1>
            <p class="text-sm text-gray-500 mt-1">
                View full information about this animal
            </p>
        </div>

        <!-- ACTIONS -->
        <div class="flex gap-3">

            <a href="{{ route('animals.edit', $animal->id) }}"
               class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-sm transition">
                ✏ Edit
            </a>

            <form action="{{ route('animals.destroy', $animal->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this animal?')">

                @csrf
                @method('DELETE')

                <button type="submit"
                    class="bg-white hover:bg-red-50 text-red-600 border border-red-200 px-5 py-2.5 rounded-xl text-sm font-semibold transition">
                    🗑 Delete
                </button>

            </form>

        </div>
    </div>

    <!-- MAIN CARD -->
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

        <!-- HERO -->
        <div class="bg-gradient-to-r from-emerald-500 to-teal-600 px-8 py-10">

            <div class="flex items-center gap-5">

                <div class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center text-3xl">
                    🐾
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-white">
                        {{ $animal->name }}
                    </h2>
                    <p class="text-emerald-100 text-sm mt-1 italic">
                        {{ $animal->species }}
                    </p>
                </div>

            </div>

        </div>

        <!-- DETAILS -->
        <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Name -->
            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <p class="text-xs font-semibold text-gray-400 uppercase">Name</p>
                <p class="text-gray-900 font-semibold mt-1">{{ $animal->name }}</p>
            </div>

            <!-- Species -->
            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <p class="text-xs font-semibold text-gray-400 uppercase">Species</p>
                <p class="text-gray-900 font-semibold mt-1 italic">{{ $animal->species }}</p>
            </div>

            <!-- Age -->
            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <p class="text-xs font-semibold text-gray-400 uppercase">Age</p>
                <span class="inline-block mt-2 px-3 py-1 text-sm rounded-full bg-amber-100 text-amber-700 font-semibold">
                    {{ $animal->age }} years old
                </span>
            </div>

       
            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <p class="text-xs font-semibold text-gray-400 uppercase">Habitat</p>
                <span class="inline-block mt-2 px-3 py-1 text-sm rounded-full bg-emerald-100 text-emerald-700 font-semibold">
                    🌿 {{ $animal->habitat }}
                </span>
            </div>

        </div>

    </div>
 
    <!-- BACK -->
    <div class="mt-6">
        <a href="{{ route('animals.index') }}"
           class="inline-flex items-center gap-2 text-sm text-gray-600 hover:text-gray-900 bg-white border border-gray-200 px-4 py-2 rounded-xl hover:bg-gray-50 transition">
            ← Back to Animals
        </a>
    </div>

</div>

</body>
</html>