<?php

namespace AdminUI\AdminUILegacy\Components;

use AdminUI\AdminUI\Models\StockHistory as SHistory;
use Illuminate\View\Component;

class StockHistory extends Component
{
    public $product_id;

    public $history;

    public function __construct($productId)
    {
        $this->product_id = $productId;
    }

    public function render()
    {
        $this->history = SHistory::where('product_id', $this->product_id)
            ->orderBy('id')
            ->get();

        return view('aui::components.ecom.history.stock-history');
    }
}
