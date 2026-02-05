<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Blog as BlogModel;

class BlogDetail extends Component
{
    public $slug;
    public $blog;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->blog = BlogModel::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();
        
        // Increment views
        $this->blog->increment('views');
    }

    public function render()
    {
        $relatedBlogs = BlogModel::where('is_published', true)
            ->where('id', '!=', $this->blog->id)
            ->where('category', $this->blog->category)
            ->take(3)
            ->get();

        if ($relatedBlogs->count() < 3) {
            $additional = BlogModel::where('is_published', true)
                ->where('id', '!=', $this->blog->id)
                ->whereNotIn('id', $relatedBlogs->pluck('id'))
                ->take(3 - $relatedBlogs->count())
                ->get();
            $relatedBlogs = $relatedBlogs->merge($additional);
        }

        return view('livewire.blog-detail', [
            'relatedBlogs' => $relatedBlogs,
        ])->title($this->blog->title . ' - BoostwareTech Solutions');
    }
}
