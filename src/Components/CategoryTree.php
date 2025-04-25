<?php

namespace AdminUI\AdminUILegacy\Components;

use AdminUI\AdminUI\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class CategoryTree extends Component
{
    public $category;

    public $mainCategory;

    public $categoryTree;

    public function __construct($category, $mainCategory = null)
    {
        $this->category = $category;
        $this->mainCategory = $mainCategory;
    }

    public function render()
    {
        // Find the category
        $mainCategory = $this->mainCategory;

        $this->categoryTree = Cache::remember('cat.tree.' . $mainCategory, 60 * 60 * 24, function () use ($mainCategory) {
            // Get the parents using recursive function
            $categories = Category::where('parent_id', $mainCategory == 0 ? null : $mainCategory)
                ->where('is_active', true)
                ->orderBy('sort_order', 'asc')
                ->get();

            $finalCategories = null;
            foreach ($categories as $key => $category) {
                $finalCategories[] =
                    [
                        'id' => $category->id,
                        'name' => $category->menu_label == '' ? $category->name : $category->menu_label,
                        'slug' => $category->slug,
                        'child' => $this->parentCollection($category),
                    ];
            }

            // If the category exist we return the array
            return json_encode($finalCategories);
        });

        return view('components.ecom.category.category-tree');
    }

    public function parentCollection($category)
    {
        $child = $category->children()
            ->where('is_active', true)
            ->orderBy('sort_order', 'ASC')
            ->get();
        $children = [];
        foreach ($child as $cat) {
            $children[] = [
                'id' => $cat->id,
                'name' => $cat->name,
                'slug' => $cat->slug,
                'child' => $this->parentCollection($cat),
            ];
        }

        return $children;
    }
}
