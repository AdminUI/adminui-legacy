<?php

namespace AdminUI\AdminUILegacy\Components;

use AdminUI\AdminUI\Models\Brand;
use Illuminate\View\Component;

class BrandTree extends Component
{
    public $brand;

    public $brands;

    public function __construct($brand)
    {
        $this->brand = $brand;
    }

    public function render()
    {
        $this->brands = cache()->remember('brandtree', 86400, function () {
            return Brand::orderBy('name')
                ->where('is_active', 1)
                ->get();
        });

        return view('components.ecom.brand.brand-tree');
    }
}
