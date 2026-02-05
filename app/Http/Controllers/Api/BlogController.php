<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::where('is_published', true);

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        if ($request->has('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        $perPage = $request->get('per_page', 50); // Default to 50 for mobile apps
        $blogs = $query->orderBy('published_at', 'desc')->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $blogs->items(), // Return array of blogs instead of paginator
            'pagination' => [
                'current_page' => $blogs->currentPage(),
                'last_page' => $blogs->lastPage(),
                'per_page' => $blogs->perPage(),
                'total' => $blogs->total(),
            ],
        ]);
    }

    public function show($slug)
    {
        $blog = Blog::where('is_published', true)
            ->where('slug', $slug)
            ->firstOrFail();

        // Increment views
        $blog->increment('views');

        return response()->json([
            'success' => true,
            'data' => $blog,
        ]);
    }

    public function featured()
    {
        $blogs = Blog::where('is_published', true)
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $blogs,
        ]);
    }

    public function categories()
    {
        $categories = Blog::where('is_published', true)
            ->distinct()
            ->pluck('category')
            ->filter()
            ->values();

        return response()->json([
            'success' => true,
            'data' => $categories,
        ]);
    }
}
