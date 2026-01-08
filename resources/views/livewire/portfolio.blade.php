<div class="py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl animate-fade-in-up">Our Masterpieces</h2>
            <p class="mt-2 text-lg leading-8 text-gray-400 animate-fade-in-up delay-100">
                A showcase of digital excellence, speed, and innovation.
            </p>
        </div>
        
        <!-- Filters (Placeholder logic for now) -->
        <div class="mt-10 flex justify-center gap-4 animate-fade-in-up delay-200">
            <button class="rounded-full bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500">All</button>
            <button class="rounded-full bg-white/10 px-4 py-2 text-sm font-semibold text-white hover:bg-white/20">Websites</button>
            <button class="rounded-full bg-white/10 px-4 py-2 text-sm font-semibold text-white hover:bg-white/20">Apps</button>
            <button class="rounded-full bg-white/10 px-4 py-2 text-sm font-semibold text-white hover:bg-white/20">Designs</button>
        </div>

        <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3 animate-fade-in-up delay-300">
            <!-- Portfolio Item 1 -->
            <article class="flex flex-col items-start justify-between group">
                <div class="relative w-full">
                    <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                    <!-- Placeholder Image -->
                    <div class="aspect-[16/9] w-full rounded-2xl bg-gray-800 object-cover sm:aspect-[2/1] lg:aspect-[3/2] overflow-hidden">
                         <div class="w-full h-full bg-gradient-to-br from-blue-900 to-slate-900 group-hover:scale-105 transition-transform duration-500 flex items-center justify-center text-gray-500">
                             [Project Image]
                         </div>
                    </div>
                </div>
                <div class="max-w-xl">
                    <div class="mt-8 flex items-center gap-x-4 text-xs">
                        <time datetime="2025-03-16" class="text-gray-400">Mar 16, 2025</time>
                        <a href="#" class="relative z-10 rounded-full bg-blue-500/10 px-3 py-1.5 font-medium text-blue-400 hover:bg-blue-500/20">Website</a>
                    </div>
                    <div class="group relative">
                        <h3 class="mt-3 text-lg font-semibold leading-6 text-white group-hover:text-blue-400">
                            <a href="#">
                                <span class="absolute inset-0"></span>
                                FinTech Dashboard
                            </a>
                        </h3>
                        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-400">
                            A high-speed financial analytics platform handling millions of transactions with real-time updates using Livewire.
                        </p>
                    </div>
                </div>
            </article>

            <!-- Additional items would be loop-rendered here -->
        </div>
    </div>
</div>
