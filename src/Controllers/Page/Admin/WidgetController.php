<?php

namespace AdminUI\AdminUILegacy\Controllers\Page\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use AdminUI\AdminUI\Helpers\Seo;
use AdminUI\AdminUI\Models\Widget;
use App\Http\Controllers\Controller;
use AdminUI\AdminUILegacy\Components\Widget as WidgetComponent;

class WidgetController extends Controller
{
    public function index(Request $request)
    {
        // Set the title
        $title = 'Widgets';

        Seo::set([
            'title' => $title,
        ]);

        // Breadcrumb
        $breadcrumb = [
            $title => '',
        ];

        // Return the view
        return view('auicontent::widget.index')
            ->with(compact('breadcrumb', 'title'));
    }

    public function store(Request $request)
    {
        // now handled in the API controller
    }

    public function edit($id)
    {
    }

    public function update(Widget $widget)
    {
        // now handled in the API controller
    }

    public function destroy($id)
    {
        // now handled in the API controller
    }

    public static function renderWidget($string)
    {
        // bring the string in
        if ($string == '') {
            return $string;
        }

        // look for [widget-]
        if (Str::contains($string, '[widget-')) {
            $parts = [];
            // get all the widgets required
            // explode the string where the [widget- exists
            $exploded = explode('[widget', $string);
            if (count($exploded) > 0) {
                foreach ($exploded as $part) {
                    if (Str::startsWith($part, '-')) {
                        $widgetName = Str::between($part, '-', ']');
                        $widgets['[widget-' . $widgetName . ']'] = $widgetName;
                    }
                }
            }

            // replace the string
            foreach ($widgets as $replace => $widget) {
                $content = new WidgetComponent($widget);
                $html = $content->render();
                $string = Str::replace($replace, $html, $string);
            }
        }

        // replace the string
        return $string;
    }
}
