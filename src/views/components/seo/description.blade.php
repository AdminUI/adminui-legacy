{{-- Meta Description --}}
@if (isset($data->seo->meta_description) && $data->seo->meta_description != '')
    <meta name="description" content="{!! $data->seo->meta_description !!}">
@endif
