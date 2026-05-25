<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- Sidebar -->
    <a href="{{ route('admin.contents.index') }}"
        class="block px-4 py-2 rounded-lg text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 font-medium">
        Konten Website
    </a>
    <div class="flex">
        <aside class="w-64 bg-white shadow-md min-h-screen p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-8">Admin Panel</h2>
            <nav class="space-y-2">
                <a href="{{ route('admin.products.index') }}"
                    class="block px-4 py-2 rounded-lg text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 font-medium">
                    Produk
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>

</body>

</html>
