<?php

namespace AdminUI\AdminUILegacy\Components;

use AdminUI\AdminUI\Models\Brand;
use Illuminate\View\Component;

class FeaturedBrand extends Component
{
    public $brands;

    public function __construct()
    {
    }

    public function render()
    {
        $this->brands = Brand::where('is_featured', 1)
            ->orderBy('name')
            ->where('is_active', 1)
            ->get();

        return view('components.ecom.brand.featured');
    }
}
