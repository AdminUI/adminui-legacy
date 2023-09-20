<?php

namespace AdminUI\AdminUILegacy\Components;

use Illuminate\View\Component;

class RecommendedProducts extends Component
{
    public $limit;

    public $title;

    public $product;

    public $products;

    public function __construct($product, $limit = 8, $title = '')
    {
        $this->product = $product;
        $this->limit = $limit;
        $this->title = $title;
    }

    public function render()
    {

        if (empty($this->product->parent_id)) {
            $this->products = $this->product->alternatives;
        } else {
            $this->products = $this->product->parent->alternatives;
        }

        if ($this->products) {
            $this->products->transform(function ($row) {
                $liveProductClass = config('adminui.classes.live_product');
                $row->liveData = $liveProductClass::getLiveData($row);

                return $row;
            });
        }

        return view('components.ecom.product.product-recommended');
    }
}
