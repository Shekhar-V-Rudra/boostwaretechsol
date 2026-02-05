<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = ContactSubmission::latest()->paginate(20);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(ContactSubmission $contact)
    {
        $contact->update(['is_read' => true]);
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(ContactSubmission $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact submission deleted successfully!');
    }

    public function markAsRead(ContactSubmission $contact)
    {
        $contact->update(['is_read' => true]);
        return back()->with('success', 'Marked as read!');
    }

    public function markAsUnread(ContactSubmission $contact)
    {
        $contact->update(['is_read' => false]);
        return back()->with('success', 'Marked as unread!');
    }
}
