<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'BoostwareTech Solutions' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-slate-900 text-white font-[Outfit] selection:bg-indigo-500 selection:text-white">
    
    <!-- Glassmorphism Background Elements -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-purple-600/20 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-blue-600/20 rounded-full blur-[120px] animate-pulse delay-1000"></div>
    </div>

    <!-- Navigation -->
    <header x-data="{ mobileMenuOpen: false }" class="fixed w-full top-0 z-50 transition-all duration-300 backdrop-blur-md bg-slate-900/70 border-b border-white/10">
        <nav class="max-w-7xl mx-auto flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="/" wire:navigate class="-m-1.5 p-1.5 text-2xl font-bold bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                    BoostwareTech
                </a>
            </div>
            
            <!-- Mobile menu button -->
            <div class="flex lg:hidden">
                <button type="button" @click="mobileMenuOpen = true" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-300">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>

            <div class="hidden lg:flex lg:gap-x-12">
                <a href="/" wire:navigate class="text-sm font-semibold leading-6 text-gray-100 hover:text-blue-400 transition">Home</a>
                <a href="/portfolio" wire:navigate class="text-sm font-semibold leading-6 text-gray-100 hover:text-blue-400 transition">Portfolio</a>
                <a href="/services" wire:navigate class="text-sm font-semibold leading-6 text-gray-100 hover:text-blue-400 transition">Services</a>
                
                <!-- Blog Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" @click.away="open = false" 
                        class="text-sm font-semibold leading-6 text-gray-100 hover:text-blue-400 transition flex items-center gap-1">
                        Blog
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" x-transition 
                        class="absolute top-full left-0 mt-2 w-48 rounded-lg bg-slate-800 border border-white/10 shadow-lg py-2 z-50">
                        <a href="/blog" wire:navigate 
                            class="block px-4 py-2 text-sm text-gray-100 hover:bg-white/5 hover:text-blue-400 transition">
                            All Articles
                        </a>
                    </div>
                </div>
                
                <a href="/careers" wire:navigate class="text-sm font-semibold leading-6 text-gray-100 hover:text-blue-400 transition">Careers</a>
                <a href="/about" wire:navigate class="text-sm font-semibold leading-6 text-gray-100 hover:text-blue-400 transition">About Us</a>
            </div>
            
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="/contact" wire:navigate class="rounded-full bg-blue-600 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition-all hover:scale-105">
                    Contact Us <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
        </nav>
        
        <!-- Mobile menu -->
        <div x-show="mobileMenuOpen" class="lg:hidden" role="dialog" aria-modal="true">
            <div class="fixed inset-0 z-50"></div>
            <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-slate-900 px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-white/10">
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5 text-xl font-bold text-white">
                        BoostwareTech
                    </a>
                    <button type="button" @click="mobileMenuOpen = false" class="-m-2.5 rounded-md p-2.5 text-gray-400">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="/" wire:navigate class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-white/5">Home</a>
                            <a href="/portfolio" wire:navigate class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-white/5">Portfolio</a>
                            <a href="/services" wire:navigate class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-white/5">Services</a>
                            <a href="/blog" wire:navigate class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-white/5">Blog</a>
                            <a href="/careers" wire:navigate class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-white/5">Careers</a>
                            <a href="/about" wire:navigate class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-white/5">About Us</a>
                        </div>
                        <div class="py-6">
                            <a href="/contact" wire:navigate class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-white hover:bg-white/5">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="pt-24 min-h-screen">
        {{ $slot }}
    </main>

    <footer class="bg-slate-950 border-t border-white/5 mt-20">
        <div class="mx-auto max-w-7xl px-6 py-12 md:flex md:items-center md:justify-between lg:px-8">
            <div class="mt-8 md:order-1 md:mt-0">
                <p class="text-center text-xs leading-5 text-gray-400">&copy; {{ date('Y') }} BoostwareTech Solutions. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
