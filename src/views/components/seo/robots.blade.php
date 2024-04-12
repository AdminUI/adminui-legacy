{{-- Robots not to index this page as Admin and Restricted --}}
@if (config('app.debug') == true)
    <meta name="robots" content="noindex, nofollow">
@elseif(!empty($data) && $data->is_index === false)
    <meta name="robots" content="noindex, nofollow">
@else
    <meta name="robots" content="index, follow">
@endif
