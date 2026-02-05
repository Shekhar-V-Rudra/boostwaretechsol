<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $query = Portfolio::where('is_active', true);

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        if ($request->has('featured')) {
            $query->where('is_featured', true);
        }

        $perPage = $request->get('per_page', 50); // Default to 50 for mobile apps
        $portfolios = $query->orderBy('order')->latest()->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $portfolios->items(), // Return array of portfolios instead of paginator
            'pagination' => [
                'current_page' => $portfolios->currentPage(),
                'last_page' => $portfolios->lastPage(),
                'per_page' => $portfolios->perPage(),
                'total' => $portfolios->total(),
            ],
        ]);
    }

    public function show($id)
    {
        $portfolio = Portfolio::where('is_active', true)->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $portfolio,
        ]);
    }

    public function categories()
    {
        $categories = Portfolio::where('is_active', true)
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
