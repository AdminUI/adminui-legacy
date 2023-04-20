<?php

namespace AdminUI\AdminUILegacy\Components;

use AdminUI\AdminUI\Models\Brand;
use Illuminate\View\Component;

class BrandTreeTop extends Component
{
    public $brands;

    public $title;

    public $class;

    public function __construct($title = false, $class = false)
    {
        $this->title = $title;
        $this->class = $class;
    }

    public function render()
    {
        $this->brands = cache()->remember('brand.root', 60 * 20, function () {
            return Brand::where('is_active', 1)
                ->inRandomOrder()
                ->take(10)
                ->get();
        });

        return view('components.ecom.brand.brand-tree-top');
    }
}
