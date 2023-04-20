<?php

namespace AdminUI\AdminUILegacy\Components;

use AdminUI\AdminUI\Models\BlogCategory;
use Illuminate\View\Component;

class BlogSidebar extends Component
{
    public $categories;

    public function render()
    {
        $this->categories = cache()->remember('news.categories', 60 * 60 * 24, function () {
            return BlogCategory::orderBy('title')->active()->get();
        });

        return view('components.blog.layout.blog-sidebar');
    }
}
