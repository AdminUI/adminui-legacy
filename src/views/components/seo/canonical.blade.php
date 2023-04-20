{{-- Canonical --}}
@if (!empty($data->seo->canonical))
    <link rel="canonical" href="{!! $data->seo->canonical !!}">
@endif
