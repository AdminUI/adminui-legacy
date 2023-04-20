<?php

namespace AdminUI\AdminUILegacy\Components;

use AdminUI\AdminUI\Models\Page;
use Illuminate\View\Component;

class PageTreeTop extends Component
{
    public $pages;

    public $title;

    public $class;

    public function __construct($title = 'Pages', $class = false)
    {
        $this->title = $title;
        $this->class = $class;
    }

    public function render()
    {
        $this->pages = cache()->remember('page.top.menu', 60 * 60 * 24, function () {
            return Page::orderBy('sort_order')
                ->where('parent_id', null)
                ->where('is_active', 1)
                ->get();
        });

        return view('aui::components.page.page-tree-top');
    }
}
