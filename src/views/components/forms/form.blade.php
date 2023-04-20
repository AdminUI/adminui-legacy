<form action="{!! $action ?? '' !!}" @if (!empty($id)) id="{{ $id }}" @endif
    method="{{ !empty($method) && $method == 'get' ? 'GET' : 'POST' }}"
    {{ $file ?? '' == 'true' ? 'enctype=multipart/form-data' : '' }}>
    <input type="hidden" name="_method" value="{!! $method ?? 'POST' !!}" />
    @csrf
    {{ $slot }}
</form>
