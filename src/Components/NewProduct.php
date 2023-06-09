<?php

namespace AdminUI\AdminUILegacy\Components;

use AdminUI\AdminUI\Models\Product;
use App\Helpers\LiveProduct;
use Illuminate\View\Component;

class NewProduct extends Component
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
        $rows = cache()->remember('newproducts', 3600, function () {
            return Product::where('is_active', 1)
                ->where('parent_id', 0)
                ->where('quantity', '>=', 1)
                ->latest()
                ->paginate($this->limit);
        });

        $rows->getCollection()->transform(function ($row) {
            $row->liveData = LiveProduct::getLiveData($row);

            return $row;
        });

        $this->featuredProducts = $rows;

        return view('components.ecom.product.product-featured');
    }
}
