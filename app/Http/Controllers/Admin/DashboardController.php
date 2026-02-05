<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Blog;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'portfolios' => Portfolio::count(),
            'blogs' => Blog::count(),
            'published_blogs' => Blog::where('is_published', true)->count(),
            'contact_submissions' => ContactSubmission::count(),
            'unread_contacts' => ContactSubmission::where('is_read', false)->count(),
        ];

        $recent_contacts = ContactSubmission::latest()->take(5)->get();
        $recent_blogs = Blog::latest()->take(5)->get();
        $recent_portfolios = Portfolio::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_contacts', 'recent_blogs', 'recent_portfolios'));
    }
}
