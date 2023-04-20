{{-- Add graph tags for better SEO --}}
@php
use AdminUI\AdminUI\Helpers\Seo;
$title = empty(Seo::title()) ? (!isset($data->seo->meta_title) ? $data->name ?? ($data->title ?? '') : $data->seo->meta_title) : Seo::title();

$title .= config('settings.default_meta_title') == '' ? ' | ' . config('app.name') : config('settings.default_meta_title');
@endphp

<meta name="og:title" property="og:title" content="{{ $title }}" />
<meta name="og:url" property="og:url" content="{!! url()->current() !!}" />
<meta name="og:site_name" property="og:site_name" content="{{ config('app.name') }}" />

@if (!empty($data->seo->image))
    <meta name="og:image" property="og:image" content="{{ $data->seo->image ?? '' }}" />
@endif
@if (!empty($data->seo->meta_description))
    <meta name="og:description" property="og:description" content="{{ $data->seo->meta_description }}">
@endif
