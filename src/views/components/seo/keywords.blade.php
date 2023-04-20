{{-- Meta Description --}}
@if (!empty($data->seo->meta_keywords))
    <meta name="keywords" content="{!! optional($data->seo)->meta_keywords !!}">
@endif
