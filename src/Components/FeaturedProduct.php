<?php

namespace AdminUI\AdminUILegacy\Components;

use AdminUI\AdminUI\Models\Product;
use App\Helpers\LiveProduct;
use Illuminate\View\Component;

class FeaturedProduct extends Component
{
    public $limit;

    public $title;

    public $featuredProducts;

    public function __construct($limit = 8, $title = '')
    {
        $this->limit = $limit;
        $this->title = $title;
    }

    public function render()
    {
        $rows = cache()->remember('featuredproducts', 3600, function () {
            $rows = Product::where('is_active', 1)
                ->where('is_featured', 1)
                ->paginate($this->limit);

            // Also get the livedata
            return $rows;
        });

        $rows->getCollection()->transform(function ($row) {
            $row->liveData = LiveProduct::getLiveData($row);

            return $row;
        });

        $this->featuredProducts = $rows;

        return view('components.ecom.product.product-featured');
    }
}
