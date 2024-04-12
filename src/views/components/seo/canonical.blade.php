{{-- Canonical --}}
@if (!empty($data->url))
<meta name="url" content="{!! $data->url !!}" />
@endif
@if (!empty($data->revised))
<meta name="revised" content="{!! $data->revised !!}" />
@endif
@if (!empty($data->canonical))
<link rel="canonical" href="{!! $data->canonical !!}">
@endif

