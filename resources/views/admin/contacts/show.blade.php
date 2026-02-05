@extends('admin.layout')

@section('title', 'Contact Message')

@section('content')
<div class="max-w-4xl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Contact Message</h1>
        <div class="space-x-2">
            @if(!$contact->is_read)
                <form action="{{ route('admin.contacts.read', $contact) }}" method="POST" class="inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                        Mark as Read
                    </button>
                </form>
            @else
                <form action="{{ route('admin.contacts.unread', $contact) }}" method="POST" class="inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                        Mark as Unread
                    </button>
                </form>
            @endif
            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                    Delete
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6 space-y-6">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-500">Name</label>
                <p class="mt-1 text-lg text-gray-900">{{ $contact->name }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Email</label>
                <p class="mt-1 text-lg text-gray-900">{{ $contact->email }}</p>
            </div>
        </div>

        @if($contact->phone)
            <div>
                <label class="block text-sm font-medium text-gray-500">Phone</label>
                <p class="mt-1 text-lg text-gray-900">{{ $contact->phone }}</p>
            </div>
        @endif

        @if($contact->subject)
            <div>
                <label class="block text-sm font-medium text-gray-500">Subject</label>
                <p class="mt-1 text-lg text-gray-900">{{ $contact->subject }}</p>
            </div>
        @endif

        <div>
            <label class="block text-sm font-medium text-gray-500">Message</label>
            <p class="mt-1 text-gray-900 whitespace-pre-wrap">{{ $contact->message }}</p>
        </div>

        <div class="pt-4 border-t">
            <p class="text-sm text-gray-500">
                Received on {{ $contact->created_at->format('F d, Y \a\t g:i A') }}
            </p>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('admin.contacts.index') }}" class="text-blue-600 hover:text-blue-900">
            ← Back to Messages
        </a>
    </div>
</div>
@endsection
