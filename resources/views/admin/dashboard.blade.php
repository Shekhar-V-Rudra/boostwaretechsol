@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-gray-500 text-sm">Total Portfolios</div>
            <div class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['portfolios'] }}</div>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-gray-500 text-sm">Total Blogs</div>
            <div class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['blogs'] }}</div>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-gray-500 text-sm">Published Blogs</div>
            <div class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['published_blogs'] }}</div>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-gray-500 text-sm">Contact Messages</div>
            <div class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['contact_submissions'] }}</div>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-gray-500 text-sm">Unread Messages</div>
            <div class="text-3xl font-bold text-red-600 mt-2">{{ $stats['unread_contacts'] }}</div>
        </div>
    </div>

    <!-- Recent Items -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Contacts -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Recent Contact Messages</h2>
            <div class="space-y-4">
                @forelse($recent_contacts as $contact)
                    <div class="border-b pb-3 last:border-0">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="font-semibold text-gray-900">{{ $contact->name }}</p>
                                <p class="text-sm text-gray-500">{{ $contact->email }}</p>
                                <p class="text-sm text-gray-600 mt-1">{{ Str::limit($contact->message, 50) }}</p>
                            </div>
                            @if(!$contact->is_read)
                                <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">New</span>
                            @endif
                        </div>
                        <a href="{{ route('admin.contacts.show', $contact) }}" class="text-blue-600 text-sm mt-2 inline-block">View →</a>
                    </div>
                @empty
                    <p class="text-gray-500">No contact messages yet.</p>
                @endforelse
            </div>
        </div>

        <!-- Recent Blogs -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Recent Blog Posts</h2>
            <div class="space-y-4">
                @forelse($recent_blogs as $blog)
                    <div class="border-b pb-3 last:border-0">
                        <p class="font-semibold text-gray-900">{{ $blog->title }}</p>
                        <p class="text-sm text-gray-500">{{ $blog->author }} • {{ $blog->created_at->format('M d, Y') }}</p>
                        <span class="inline-block mt-2 text-xs px-2 py-1 rounded {{ $blog->is_published ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $blog->is_published ? 'Published' : 'Draft' }}
                        </span>
                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="text-blue-600 text-sm mt-2 inline-block ml-2">Edit →</a>
                    </div>
                @empty
                    <p class="text-gray-500">No blog posts yet.</p>
                @endforelse
            </div>
        </div>

        <!-- Recent Portfolios -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Recent Portfolio Items</h2>
            <div class="space-y-4">
                @forelse($recent_portfolios as $portfolio)
                    <div class="border-b pb-3 last:border-0">
                        <p class="font-semibold text-gray-900">{{ $portfolio->title }}</p>
                        <p class="text-sm text-gray-500">{{ $portfolio->category }} • {{ $portfolio->created_at->format('M d, Y') }}</p>
                        <span class="inline-block mt-2 text-xs px-2 py-1 rounded {{ $portfolio->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $portfolio->is_active ? 'Active' : 'Inactive' }}
                        </span>
                        <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="text-blue-600 text-sm mt-2 inline-block ml-2">Edit →</a>
                    </div>
                @empty
                    <p class="text-gray-500">No portfolio items yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
