<?php

namespace AdminUI\AdminUILegacy\Components;

use AdminUI\AdminUI\Controllers\Page\Admin\WidgetController;
use Illuminate\View\Component;

class ViewPage extends Component
{
    public $page;

    public $pageContent;

    public $sidebarContent;

    public function __construct($page)
    {
        $this->page = $page;
    }

    public function render()
    {
        // Page layout
        $pageLayout = $this->page->pageLayout;

        // add the read more stuff
        // Replace with the html content
        $this->pageContent = str_replace('<p><button class="aui-read-more">', '<p class="aui-read-more"><button class="aui-read-more">', $this->page->content) ?? '';
        // Allow use of shortcodes in page, [some-component] will translate to <vue-some-component></vue-some-component>
        $this->pageContent = preg_replace('/\[([\w-]+)\s?([^\]]+)?\]/i', '<vue-${1} ${2}></vue-${1}>', $this->pageContent) ?? '';

        // Replace with the html content where widgets
        $this->pageContent = WidgetController::renderWidget($this->pageContent ?? '');
        $this->sidebarContent = WidgetController::renderWidget($pageLayout->sidebar_content ?? '');

        return view('aui::components.page.view-page');
    }
}
