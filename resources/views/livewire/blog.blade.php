<div class="py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <!-- Header -->
        <div class="mx-auto max-w-2xl text-center mb-16">
            <h1 class="text-4xl font-bold tracking-tight text-white sm:text-5xl">Our Blog</h1>
            <p class="mt-4 text-lg leading-8 text-gray-400">
                Insights, updates, and stories from the world of technology and development.
            </p>
        </div>

        <!-- Search and Filters -->
        <div class="mb-12 space-y-6">
            <!-- Search Bar -->
            <div class="max-w-md mx-auto">
                <div class="relative">
                    <input type="text" wire:model.live.debounce.300ms="search" 
                        placeholder="Search articles..." 
                        class="w-full rounded-lg bg-white/5 border border-white/10 px-4 py-3 pl-10 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg class="absolute left-3 top-3.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>

            <!-- Category Filters -->
            <div class="flex flex-wrap justify-center gap-3">
                <button wire:click="filterByCategory('all')" 
                    class="rounded-full px-4 py-2 text-sm font-semibold transition {{ $selectedCategory === 'all' ? 'bg-blue-600 text-white' : 'bg-white/5 text-white hover:bg-white/10' }}">
                    All
                </button>
                @foreach($categories as $category)
                    <button wire:click="filterByCategory('{{ $category }}')" 
                        class="rounded-full px-4 py-2 text-sm font-semibold transition capitalize {{ $selectedCategory === $category ? 'bg-blue-600 text-white' : 'bg-white/5 text-white hover:bg-white/10' }}">
                        {{ $category }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Featured Blogs -->
        @if($featuredBlogs->count() > 0 && $selectedCategory === 'all' && !$search)
            <div class="mb-16">
                <h2 class="text-2xl font-bold text-white mb-6">Featured Articles</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($featuredBlogs as $featured)
                        <a href="{{ route('blog.show', $featured->slug) }}" wire:navigate 
                            class="group rounded-xl bg-white/5 p-6 border border-white/10 hover:border-blue-500/50 transition-all hover:-translate-y-1">
                            @if($featured->featured_image)
                                <img src="{{ asset('storage/' . $featured->featured_image) }}" alt="{{ $featured->title }}" 
                                    class="w-full h-48 object-cover rounded-lg mb-4 group-hover:scale-105 transition-transform">
                            @else
                                <div class="w-full h-48 bg-gradient-to-br from-blue-900 to-slate-900 rounded-lg mb-4 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                    </svg>
                                </div>
                            @endif
                            <span class="text-xs px-2 py-1 rounded-full bg-blue-500/10 text-blue-400 capitalize">{{ $featured->category }}</span>
                            <h3 class="mt-3 text-lg font-semibold text-white group-hover:text-blue-400 transition">
                                {{ $featured->title }}
                            </h3>
                            @if($featured->excerpt)
                                <p class="mt-2 text-sm text-gray-400 line-clamp-2">{{ $featured->excerpt }}</p>
                            @endif
                            <div class="mt-4 flex items-center text-xs text-gray-500">
                                <span>{{ $featured->author }}</span>
                                <span class="mx-2">•</span>
                                <span>{{ $featured->published_at?->format('M d, Y') }}</span>
                                <span class="mx-2">•</span>
                                <span>{{ $featured->views }} views</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Blog Grid -->
        <div>
            <h2 class="text-2xl font-bold text-white mb-6">
                @if($search)
                    Search Results
                @elseif($selectedCategory !== 'all')
                    {{ ucfirst($selectedCategory) }} Articles
                @else
                    All Articles
                @endif
            </h2>

            @if($blogs->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($blogs as $blog)
                        <article class="group flex flex-col rounded-xl bg-white/5 border border-white/10 hover:border-blue-500/50 transition-all hover:-translate-y-1 overflow-hidden">
                            @if($blog->featured_image)
                                <a href="{{ route('blog.show', $blog->slug) }}" wire:navigate>
                                    <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" 
                                        class="w-full h-48 object-cover group-hover:scale-105 transition-transform">
                                </a>
                            @else
                                <div class="w-full h-48 bg-gradient-to-br from-blue-900 to-slate-900 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                    </svg>
                                </div>
                            @endif
                            
                            <div class="p-6 flex-1 flex flex-col">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="text-xs px-2 py-1 rounded-full bg-blue-500/10 text-blue-400 capitalize">{{ $blog->category }}</span>
                                    @if($blog->tags && count($blog->tags) > 0)
                                        <span class="text-xs text-gray-500">
                                            {{ implode(', ', array_slice($blog->tags, 0, 2)) }}
                                        </span>
                                    @endif
                                </div>
                                
                                <a href="{{ route('blog.show', $blog->slug) }}" wire:navigate>
                                    <h3 class="text-xl font-semibold text-white mb-2 group-hover:text-blue-400 transition">
                                        {{ $blog->title }}
                                    </h3>
                                </a>
                                
                                @if($blog->excerpt)
                                    <p class="text-gray-400 text-sm mb-4 line-clamp-3 flex-1">{{ $blog->excerpt }}</p>
                                @else
                                    <p class="text-gray-400 text-sm mb-4 line-clamp-3 flex-1">{{ Str::limit(strip_tags($blog->content), 150) }}</p>
                                @endif
                                
                                <div class="flex items-center justify-between text-xs text-gray-500 mt-auto">
                                    <div class="flex items-center gap-3">
                                        <span>{{ $blog->author }}</span>
                                        <span>•</span>
                                        <span>{{ $blog->published_at?->format('M d, Y') }}</span>
                                    </div>
                                    <span>{{ $blog->views }} views</span>
                                </div>
                                
                                <a href="{{ route('blog.show', $blog->slug) }}" wire:navigate 
                                    class="mt-4 text-blue-400 hover:text-blue-300 text-sm font-semibold inline-flex items-center">
                                    Read More →
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $blogs->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-400">No blog posts found.</p>
                </div>
            @endif
        </div>
    </div>
</div>
