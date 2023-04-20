<?php

namespace AdminUI\AdminUILegacy\Components;

use AdminUI\AdminUI\Models\TopSeller as TopSellerModel;
use Illuminate\View\Component;

class TopSeller extends Component
{
    public $id;

    public $topseller;

    public function __construct($id = 0)
    {
        $this->id = $id;
    }

    public function render()
    {
        if ($this->id == 0) {
            return false;
        }

        $this->topseller = cache()->remember('topseller.' . $this->id, 3600, function () {
            return TopSellerModel::where('is_active', 1)
                ->where('id', $this->id)
                ->with('media')
                ->first();
        });

        if (!$this->topseller) {
            return false;
        }

        return view('components.ecom.topsellers.topseller');
    }
}
