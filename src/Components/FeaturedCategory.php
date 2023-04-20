<?php

namespace AdminUI\AdminUILegacy\Components;

use AdminUI\AdminUI\Models\Category;
use Illuminate\View\Component;

class FeaturedCategory extends Component
{
    public $limit;

    public $title;

    public $categories;

    public function __construct($limit = 12, $title = '')
    {
        $this->title = $title;
        $this->limit = $limit;
    }

    public function render()
    {
        $this->categories = Category::orderBy('sort_order')
            ->where('is_featured', 1)
            ->where('is_active', 1)
            ->limit($this->limit)
            ->get();

        return view('components.ecom.category.category-featured');
    }
}
