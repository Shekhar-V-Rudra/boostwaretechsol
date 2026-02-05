<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Portfolio as PortfolioModel;

class Portfolio extends Component
{
    #[Title('Portfolio - BoostwareTech Solutions')]
    public $selectedCategory = 'all';

    public function filterByCategory($category)
    {
        $this->selectedCategory = $category;
    }

    public function render()
    {
        $query = PortfolioModel::where('is_active', true);

        if ($this->selectedCategory !== 'all') {
            $query->where('category', $this->selectedCategory);
        }

        $portfolios = $query->orderBy('order')->latest()->get();
        $categories = PortfolioModel::where('is_active', true)->distinct()->pluck('category');

        return view('livewire.portfolio', [
            'portfolios' => $portfolios,
            'categories' => $categories,
        ]);
    }
}
