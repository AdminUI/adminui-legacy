<?php

namespace AdminUI\AdminUILegacy\Components;

use AdminUI\AdminUI\Models\Widget as WidgetModel;
use Illuminate\View\Component;

class Widget extends Component
{
    public $title;

    public function __construct($title = '')
    {
        $this->title = $title;
    }

    public function render()
    {
        if ($this->title == '') {
            return false;
        }

        $widget = cache()->remember('widget.' . $this->title, 3600, function () {
            return WidgetModel::where('is_active', 1)
                ->where('slug', $this->title)
                ->with('media')
                ->first();
        });

        if (!$widget) {
            return false;
        }

        return view('components.widgets.default')->with(['widget' => $widget]);
    }
}
