{{-- Meta Description --}}
@if (isset($data->meta_description) && $data->meta_description != '')
    <meta name="description" content="{!! $data->meta_description !!}">
@endif
