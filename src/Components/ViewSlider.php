<?php

namespace AdminUI\AdminUILegacy\Components;

use AdminUI\AdminUI\Models\Slider;
use Illuminate\View\Component;

/**
 * [DIsplay the slide component]
 */
class ViewSlider extends Component
{
    public $slider;

    public $slides;

    public $hidedelimiters;

    public $autoplay;

    public $hidearrows;

    public $element;

    public function __construct($element, $slider = null, bool $hidedelimiters = false, bool $autoplay = true, bool $hidearrows = false)
    {
        $this->slider = $slider;
        $this->hidedelimiters = $hidedelimiters;
        $this->autoplay = $autoplay;
        $this->hidearrows = $hidearrows;
        $this->element = $element;
    }

    public function render()
    {
        $this->slides = Slider::where('name', $this->slider)
            ->with('slides')
            ->first();

        return view('aui::components.slider.view-slider');
    }
}
