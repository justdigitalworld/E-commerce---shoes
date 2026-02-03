<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
            <div class="p-6 border-b">
                <h1 class="text-2xl font-bold text-gray-800">Admin Panel</h1>
            </div>
            <nav class="mt-6 px-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-lg transition-colors hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600 font-bold border-r-4 border-blue-600' : '' }}">
                    <i class="fas fa-home w-6 mr-3"></i>
                    Dashboard
                </a>
                <a href="{{ route('admin.products.index') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-lg transition-colors hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('admin.products.*') ? 'bg-blue-50 text-blue-600 font-bold border-r-4 border-blue-600' : '' }}">
                    <i class="fas fa-box w-6 mr-3"></i>
                    Products
                </a>
                <a href="{{ route('admin.categories.index') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-lg transition-colors hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('admin.categories.*') ? 'bg-blue-50 text-blue-600 font-bold border-r-4 border-blue-600' : '' }}">
                    <i class="fas fa-tags w-6 mr-3"></i>
                    Categories
                </a>
                <a href="{{ route('admin.orders.index') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-lg transition-colors hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('admin.orders.*') ? 'bg-blue-50 text-blue-600 font-bold border-r-4 border-blue-600' : '' }}">
                    <i class="fas fa-shopping-cart w-6 mr-3"></i>
                    Orders
                </a>
                <a href="{{ route('admin.users.index') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-lg transition-colors hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('admin.users.index') ? 'bg-blue-50 text-blue-600 font-bold border-r-4 border-blue-600' : '' }}">
                    <i class="fas fa-users w-6 mr-3"></i>
                    Users
                </a>
                
                <div class="pt-10">
                    <a href="{{ route('home') }}" class="flex items-center px-4 py-3 text-gray-500 hover:text-gray-900 transition-colors">
                        <i class="fas fa-external-link-alt w-6 mr-3"></i>
                        View Site
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-10">
            <!-- Navbar -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">@yield('header')</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-600 hover:underline">Logout</button>
                    </form>
                </div>
            </div>

            <!-- Content -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
