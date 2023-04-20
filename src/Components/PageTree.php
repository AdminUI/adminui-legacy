<?php

namespace AdminUI\AdminUILegacy\Components;

use AdminUI\AdminUI\Models\Page;
use Illuminate\View\Component;

class PageTree extends Component
{
    public $page;

    public $pagetree;

    public $highlightColor;

    public function __construct($page, $highlightColor = null)
    {
        $this->page = $page;
        $this->highlightColor = $highlightColor ?? 'red';
    }

    public function render()
    {
        $this->pagetree = cache()->remember('pagetree', 86400, function () {
            $page = new Page();

            return json_encode($page->callParent());
        });

        return view('aui::components.page.page-tree');
    }
}
