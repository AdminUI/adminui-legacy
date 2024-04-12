{{-- Add graph tags for better SEO --}}
<meta property="og:title" content="{!! $data->og_title !!}" />
<meta property="og:url" content="{!! $data->url !!}" />
<meta property="og:site_name" content="{!! config('app.name') !!}" />
@if (!empty($data->og_image))
<meta property="og:image" content="{!! $data->og_image ?? '' !!}" />
@endif
@if (!empty($data->og_description))
<meta property="og:description" content="{!! $data->og_description !!}">
@endif

{{-- Twitter X --}}
<meta property="twitter:title" content="{!! $data->og_title !!}" />
<meta property="twitter:url" content="{!! $data->url !!}" />
<meta property="twitter:site_name" content="{!! config('app.name') !!}" />
@if (!empty($data->og_image))
<meta property="twitter:image" content="{!! $data->og_image ?? '' !!}" />
@endif
@if (!empty($data->og_description))
<meta property="twitter:description" content="{!! $data->og_description !!}">
@endif
