<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - BoostwareTech</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-slate-900 text-white min-h-screen">
            <div class="p-6">
                <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                    BoostwareTech
                </h1>
                <p class="text-sm text-gray-400 mt-1">Admin Panel</p>
            </div>
            <nav class="mt-8">
                <a href="{{ route('admin.dashboard') }}" class="block px-6 py-3 hover:bg-slate-800 {{ request()->routeIs('admin.dashboard') ? 'bg-slate-800 border-l-4 border-blue-500' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.portfolios.index') }}" class="block px-6 py-3 hover:bg-slate-800 {{ request()->routeIs('admin.portfolios.*') ? 'bg-slate-800 border-l-4 border-blue-500' : '' }}">
                    Portfolios
                </a>
                <a href="{{ route('admin.blogs.index') }}" class="block px-6 py-3 hover:bg-slate-800 {{ request()->routeIs('admin.blogs.*') ? 'bg-slate-800 border-l-4 border-blue-500' : '' }}">
                    Blogs
                </a>
                <a href="{{ route('admin.contacts.index') }}" class="block px-6 py-3 hover:bg-slate-800 {{ request()->routeIs('admin.contacts.*') ? 'bg-slate-800 border-l-4 border-blue-500' : '' }}">
                    Contact Messages
                    @php
                        $unreadCount = \App\Models\ContactSubmission::where('is_read', false)->count();
                    @endphp
                    @if($unreadCount > 0)
                        <span class="ml-2 bg-red-500 text-white text-xs px-2 py-1 rounded-full">{{ $unreadCount }}</span>
                    @endif
                </a>
            </nav>
            <div class="absolute bottom-0 w-64 p-6 border-t border-slate-800">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-6 py-3 hover:bg-slate-800 text-gray-300">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
