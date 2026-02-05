<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use App\Models\Blog as BlogModel;

class Blog extends Component
{
    use WithPagination;
    #[Title('Blog - BoostwareTech Solutions')]
    public $selectedCategory = 'all';
    public $search = '';

    public function filterByCategory($category)
    {
        $this->selectedCategory = $category;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSelectedCategory()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = BlogModel::where('is_published', true);

        if ($this->selectedCategory !== 'all') {
            $query->where('category', $this->selectedCategory);
        }

        if ($this->search) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('content', 'like', '%' . $this->search . '%')
                  ->orWhere('excerpt', 'like', '%' . $this->search . '%');
            });
        }

        $blogs = $query->orderBy('published_at', 'desc')->paginate(9);
        $categories = BlogModel::where('is_published', true)->distinct()->pluck('category')->filter()->values();
        $featuredBlogs = BlogModel::where('is_published', true)->orderBy('views', 'desc')->take(3)->get();

        return view('livewire.blog', [
            'blogs' => $blogs,
            'categories' => $categories,
            'featuredBlogs' => $featuredBlogs,
        ]);
    }
}
