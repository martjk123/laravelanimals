<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Animals — ZooMS</title>
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

<div class="max-w-7xl mx-auto px-4 py-10">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>
            <h1 class="text-3xl font-bold text-green-700">Animal Registry</h1>
            <p class="text-sm text-gray-500">
                {{ $animals->count() }} animals registered
            </p>
        </div>

        <div class="flex gap-3">
            <!-- <input
                type="text"
                placeholder="Search animals..."
                class="px-4 py-2 rounded-xl border border-gray-200 focus:ring-2 focus:ring-emerald-500 outline-none text-sm"
            > -->

            <a href="/animals/create"
               class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2 rounded-xl text-sm font-semibold shadow-sm">
                + Add Animal
            </a>
        </div>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">

                <thead class="bg-gray-50 text-gray-600 uppercase text-xs tracking-wider">
                <tr>
                    <th class="px-6 py-4 text-left">#</th>
                    <th class="px-6 py-4 text-left">Name</th>
                    <th class="px-6 py-4 text-left">Species</th>
                    <th class="px-6 py-4 text-left">Age</th>
                    <th class="px-6 py-4 text-left">Habitat</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                @forelse ($animals as $index => $animal)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4 text-gray-400">
                            {{ $index + 1 }}
                        </td>

                        <td class="px-6 py-4 font-semibold text-gray-900">
                            {{ $animal->name }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $animal->species }}
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs rounded-full bg-amber-100 text-amber-700">
                                {{ $animal->age }} yrs
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-700">
                                {{ $animal->habitat }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-3">

                                <a href="/animals/{{ $animal->id }}"
                                   class="text-emerald-600 hover:text-emerald-800 text-sm font-medium">
                                    View
                                </a>

                                <a href="/animals/{{ $animal->id }}/edit"
                                   class="text-gray-600 hover:text-gray-900 text-sm font-medium">
                                    Edit
                                </a>

                                <!-- DELETE FORM -->
                                <form id="delete-form-{{ $animal->id }}"
                                      action="{{ route('animals.destroy', $animal->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="button"
                                        class="text-red-600 hover:text-red-800 text-sm font-medium"
                                        data-id="{{ $animal->id }}"
                                        onclick="openDeleteModal(this.dataset.id)">
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-12 text-gray-400">
                            <p class="text-lg font-medium">No animals found</p>
                            <p class="text-sm">Start by adding your first animal</p>
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL -->
<div id="deleteModal"
     class="fixed inset-0 hidden items-center justify-center bg-black/50 z-50">

    <div class="bg-white w-full max-w-md rounded-2xl shadow-lg p-6">

        <h2 class="text-xl font-semibold text-gray-900">Confirm Deletion</h2>

        <p class="text-gray-500 mt-2">
            Are you sure you want to delete this animal? This action cannot be undone.
        </p>

        <div class="flex justify-end gap-3 mt-6">

            <button
                onclick="closeDeleteModal()"
                class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700">
                Cancel
            </button>

            <button
                onclick="confirmDelete()"
                class="px-4 py-2 rounded-xl bg-red-600 hover:bg-red-700 text-white">
                Delete
            </button>

        </div>
    </div>
</div>

<!-- SCRIPT -->
<script>
    let deleteTargetId = null;

    function openDeleteModal(id) {
        deleteTargetId = id;

        const modal = document.getElementById('deleteModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeDeleteModal() {
        deleteTargetId = null;

        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    function confirmDelete() {
        if (!deleteTargetId) return;

        document.getElementById(`delete-form-${deleteTargetId}`).submit();
    }
</script>

</body>
</html>