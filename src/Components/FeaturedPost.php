<?php

namespace AdminUI\AdminUILegacy\Components;

use AdminUI\AdminUI\Models\Blog;
use Illuminate\View\Component;

class FeaturedPost extends Component
{
    public $limit;

    public $title;

    public $featuredPosts;

    public function __construct($limit = 8, $title = '')
    {
        $this->title = $title;
        $this->limit = $limit;
    }

    public function render()
    {
        $this->featuredPosts = Blog::active()
            ->where('published_at', '<=', now())
            ->limit($this->limit)
            ->orderBy('published_at', 'desc')
            ->get();

        return view('components.blog.posts.blog-featured');
    }
}
