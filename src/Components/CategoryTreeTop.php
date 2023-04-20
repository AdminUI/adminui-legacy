<?php

namespace AdminUI\AdminUILegacy\Components;

use AdminUI\AdminUI\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class CategoryTreeTop extends Component
{
    public $category;

    public $categories;

    public $title;

    public $class;

    public function __construct($category = 1, $title = false, $class = false)
    {
        $this->category = $category;
        $this->title = $title;
        $this->class = $class;
    }

    public function render()
    {
        // Find the category
        $this->categories = Cache::remember('cat.root', 60 * 60 * 24, function () {
            // Get the parents using recursive function
            return Category::where('parent_id', null)
                ->where('is_active', true)
                ->inRandomOrder()
                ->take(10)
                ->get();
        });

        return view('components.ecom.category.category-tree-top');
    }
}
