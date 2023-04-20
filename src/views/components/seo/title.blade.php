<?php
use AdminUI\AdminUI\Helpers\Seo;
?>
<title>
    {!! empty(Seo::title()) ? (!isset($data->seo->meta_title) ? $data->name ?? ($data->title ?? '') : $data->seo->meta_title) : Seo::title() !!}
    {!! config('settings.default_meta_title') == '' ? ' | ' . config('app.name') : config('settings.default_meta_title') !!}
</title>
