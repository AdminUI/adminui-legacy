
@switch ($file->extension)
    @case('png')
    @case('jpg')
    @case('jpeg')
    @case('gif')
        <img src="
            {{ route('media.view', [
                'encId' => $file->id,
                'size' => $size,
                'name' => $file->name
            ]) }}"
            alt="{{ $file->alt }}"
            title="{{ $file->title }}"
            class="img-fluid {{ $class ?? '' }}"
        />
        @break
    @case('pdf')
        PDF
        <i class="icon icon-pdf"></i>
        @break
@endswitch
