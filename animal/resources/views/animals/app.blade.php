<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Zoo Animal Management System')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-emerald-50 min-h-screen flex flex-col text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
            <a href="{{ route('animals.index') }}" class="flex items-center gap-2 font-bold text-lg">
                <span class="text-2xl">🦁</span>
                <span class="text-gray-800">ZooMS</span>
                <span class="text-xs font-medium text-emerald-600 bg-emerald-50 border border-emerald-200 px-2 py-0.5 rounded-full ml-1">Animal Management</span>
            </a>
            <div class="flex items-center gap-1">
                <a href="{{ route('animals.index') }}"
                   class="text-sm text-gray-500 hover:text-emerald-700 hover:bg-emerald-50 px-4 py-2 rounded-lg transition-colors">
                    All Animals
                </a>
                <a href="{{ route('animals.create') }}"
                   class="text-sm font-semibold text-white bg-emerald-600 hover:bg-emerald-700 px-4 py-2 rounded-lg transition-colors">
                    + Add Animal
                </a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="flex-1 max-w-6xl mx-auto w-full px-6 py-10">

        @if(session('success'))
            <div class="mb-6 flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-lg text-sm font-medium">
                <span>✓</span> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm font-medium">
                <span>✕</span> {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>