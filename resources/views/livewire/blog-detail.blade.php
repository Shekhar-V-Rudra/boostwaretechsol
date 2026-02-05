<div class="py-24 sm:py-32">
    <div class="mx-auto max-w-4xl px-6 lg:px-8">
        <!-- Back Button -->
        <a href="{{ route('blog') }}" wire:navigate 
            class="inline-flex items-center text-sm text-gray-400 hover:text-white mb-8 transition">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Blog
        </a>

        <!-- Article Header -->
        <article>
            <header class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <span class="px-3 py-1 rounded-full bg-blue-500/10 text-blue-400 text-sm font-semibold capitalize">
                        {{ $blog->category }}
                    </span>
                    @if($blog->tags && count($blog->tags) > 0)
                        @foreach(array_slice($blog->tags, 0, 3) as $tag)
                            <span class="px-3 py-1 rounded-full bg-white/5 text-gray-400 text-sm">
                                #{{ $tag }}
                            </span>
                        @endforeach
                    @endif
                </div>
                
                <h1 class="text-4xl font-bold text-white mb-4">{{ $blog->title }}</h1>
                
                <div class="flex items-center gap-4 text-sm text-gray-400">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span>{{ $blog->author }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>{{ $blog->published_at?->format('F d, Y') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <span>{{ $blog->views }} views</span>
                    </div>
                </div>
            </header>

            <!-- Featured Image -->
            @if($blog->featured_image)
                <div class="mb-8 rounded-2xl overflow-hidden">
                    <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" 
                        class="w-full h-auto object-cover">
                </div>
            @endif

            <!-- Excerpt -->
            @if($blog->excerpt)
                <div class="mb-8 p-6 rounded-xl bg-blue-500/10 border border-blue-500/20">
                    <p class="text-lg text-gray-300 leading-relaxed">{{ $blog->excerpt }}</p>
                </div>
            @endif

            <!-- Article Content -->
            <div class="prose prose-invert prose-lg max-w-none">
                <div class="text-gray-300 leading-relaxed whitespace-pre-wrap">
                    {!! nl2br(e($blog->content)) !!}
                </div>
            </div>

            <!-- Tags -->
            @if($blog->tags && count($blog->tags) > 0)
                <div class="mt-12 pt-8 border-t border-white/10">
                    <h3 class="text-sm font-semibold text-white mb-4">Tags:</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($blog->tags as $tag)
                            <span class="px-3 py-1 rounded-full bg-white/5 text-gray-400 text-sm hover:bg-white/10 transition">
                                #{{ $tag }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif
        </article>

        <!-- Related Articles -->
        @if($relatedBlogs->count() > 0)
            <div class="mt-16 pt-12 border-t border-white/10">
                <h2 class="text-2xl font-bold text-white mb-8">Related Articles</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedBlogs as $related)
                        <a href="{{ route('blog.show', $related->slug) }}" wire:navigate 
                            class="group rounded-xl bg-white/5 p-6 border border-white/10 hover:border-blue-500/50 transition-all hover:-translate-y-1">
                            @if($related->featured_image)
                                <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}" 
                                    class="w-full h-32 object-cover rounded-lg mb-4 group-hover:scale-105 transition-transform">
                            @else
                                <div class="w-full h-32 bg-gradient-to-br from-blue-900 to-slate-900 rounded-lg mb-4"></div>
                            @endif
                            <span class="text-xs px-2 py-1 rounded-full bg-blue-500/10 text-blue-400 capitalize">{{ $related->category }}</span>
                            <h3 class="mt-3 text-lg font-semibold text-white group-hover:text-blue-400 transition line-clamp-2">
                                {{ $related->title }}
                            </h3>
                            <p class="mt-2 text-sm text-gray-400 line-clamp-2">
                                {{ $related->excerpt ?: Str::limit(strip_tags($related->content), 100) }}
                            </p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
