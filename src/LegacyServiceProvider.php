<?php

namespace AdminUI\AdminUILegacy;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LegacyServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadComponents();
        $this->loadViews();
    }

    public function loadComponents()
    {
        if (is_dir(__DIR__ . '/Components')) {
            // Loading the components in the folder root
            foreach (glob(__DIR__ . '/Components/*') as $component) {
                $alias = 'aui' . '-' . strtolower(pathinfo($component, PATHINFO_FILENAME));
                $class = __NAMESPACE__ . '\\Components\\' . pathinfo($component, PATHINFO_FILENAME);
                Blade::component($alias, $class);
            }
            // Loading the components in the subfolder
            foreach (glob(__DIR__ . '/Components/*', GLOB_ONLYDIR) as $subFolder) {
                foreach (glob($subFolder . '/*') as $component) {
                    //Dynamic get the folder name
                    $folderPices = explode('/', $component);
                    //get the folder name
                    $foldeName = $folderPices[count($folderPices) - 2];

                    $alias = 'aui' . '-' . strtolower(pathinfo($component, PATHINFO_FILENAME));
                    $class = __NAMESPACE__ . '\\Components\\' . $foldeName . '\\' . pathinfo($component, PATHINFO_FILENAME);
                    Blade::component($alias, $class);
                }
            }
        }
    }

    public function loadViews()
    {
        if (is_dir(__DIR__ . '/views')) {
            $this->loadViewsFrom(__DIR__ . '/views', 'aui');
            foreach (glob(__DIR__ . '/views/*') as $viewDir) {
                if (!is_dir($viewDir)) {
                    continue;
                }
                $folderName = strtolower(basename($viewDir));
                $this->loadViewsFrom($viewDir, 'aui' . $folderName);
            }
        }
    }
}
