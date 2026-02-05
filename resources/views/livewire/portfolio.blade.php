<div class="py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Our Portfolio</h2>
            <p class="mt-2 text-lg leading-8 text-gray-400">
                Showcasing our best work across web development, mobile apps, and design.
            </p>
        </div>
        
        <!-- Category Filters -->
        <div class="mt-10 flex flex-wrap justify-center gap-4">
            <button wire:click="filterByCategory('all')" 
                class="rounded-full px-4 py-2 text-sm font-semibold transition {{ $selectedCategory === 'all' ? 'bg-blue-600 text-white' : 'bg-white/10 text-white hover:bg-white/20' }}">
                All
            </button>
            @foreach($categories as $category)
                <button wire:click="filterByCategory('{{ $category }}')" 
                    class="rounded-full px-4 py-2 text-sm font-semibold transition capitalize {{ $selectedCategory === $category ? 'bg-blue-600 text-white' : 'bg-white/10 text-white hover:bg-white/20' }}">
                    {{ $category }}
                </button>
            @endforeach
        </div>

        <!-- Portfolio Grid -->
        <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @forelse($portfolios as $portfolio)
                <article class="flex flex-col items-start justify-between group">
                    <div class="relative w-full">
                        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                        <div class="aspect-[16/9] w-full rounded-2xl bg-gray-800 object-cover sm:aspect-[2/1] lg:aspect-[3/2] overflow-hidden">
                            @if($portfolio->thumbnail)
                                <img src="{{ asset('storage/' . $portfolio->thumbnail) }}" alt="{{ $portfolio->title }}" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @elseif($portfolio->image)
                                <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-900 to-slate-900 group-hover:scale-105 transition-transform duration-500 flex items-center justify-center">
                                    <div class="text-center text-gray-500">
                                        <svg class="w-16 h-16 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <p class="text-sm">{{ $portfolio->title }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="max-w-xl">
                        <div class="mt-8 flex items-center gap-x-4 text-xs">
                            @if($portfolio->project_date)
                                <time datetime="{{ $portfolio->project_date->format('Y-m-d') }}" class="text-gray-400">
                                    {{ $portfolio->project_date->format('M d, Y') }}
                                </time>
                            @endif
                            <span class="relative z-10 rounded-full bg-blue-500/10 px-3 py-1.5 font-medium text-blue-400 capitalize">
                                {{ $portfolio->category }}
                            </span>
                            @if($portfolio->is_featured)
                                <span class="relative z-10 rounded-full bg-yellow-500/10 px-3 py-1.5 font-medium text-yellow-400">
                                    Featured
                                </span>
                            @endif
                        </div>
                        <div class="group relative">
                            <h3 class="mt-3 text-lg font-semibold leading-6 text-white group-hover:text-blue-400">
                                @if($portfolio->project_url)
                                    <a href="{{ $portfolio->project_url }}" target="_blank" rel="noopener">
                                        <span class="absolute inset-0"></span>
                                        {{ $portfolio->title }}
                                    </a>
                                @else
                                    {{ $portfolio->title }}
                                @endif
                            </h3>
                            <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-400">
                                {{ $portfolio->description }}
                            </p>
                            @if($portfolio->technologies && count($portfolio->technologies) > 0)
                                <div class="mt-4 flex flex-wrap gap-2">
                                    @foreach(array_slice($portfolio->technologies, 0, 3) as $tech)
                                        <span class="text-xs px-2 py-1 rounded bg-white/5 text-gray-300">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                    @if(count($portfolio->technologies) > 3)
                                        <span class="text-xs px-2 py-1 rounded bg-white/5 text-gray-300">
                                            +{{ count($portfolio->technologies) - 3 }} more
                                        </span>
                                    @endif
                                </div>
                            @endif
                            @if($portfolio->client_name)
                                <p class="mt-3 text-xs text-gray-500">
                                    Client: {{ $portfolio->client_name }}
                                </p>
                            @endif
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-400">No portfolio items found in this category.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
