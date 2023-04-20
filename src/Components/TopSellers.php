<?php

namespace AdminUI\AdminUILegacy\Components;

use AdminUI\AdminUI\Models\TopSeller as TopSellerModel;
use Illuminate\View\Component;

class TopSellers extends Component
{
    public $title;

    public $topsellers;

    public function __construct($title = '')
    {
        $this->title = $title;
    }

    public function render()
    {
        $this->topsellers = cache()->remember('topsellers', 3600, function () {
            return TopSellerModel::where('is_active', 1)
                ->with('media')
                ->get();
        });

        if (!$this->topsellers) {
            return false;
        }

        return view('components.ecom.topsellers.topsellers');
    }
}
