<div>
    @php
    $image = short_encrypt(json_encode([
        'id'        => $file->id,
        'extension' => $file->extension,
        'folder'    => $file->folder->name ?? 'other',
        'width'     => $width ?? 0,
        'height'    => $height ?? 0,
        'crop'      => $crop ?? false
    ]))
    @endphp
    <picture class="{{ $class }}">
        <img src="{{ route('media.image.view', ['image' => $image, 'name'=> $file->name.'.'.$file->extension ]) }}"
            class="{{ $class }}"
            alt="{{ $file->alt ?? '' }}"
            title="{{ $file->title ?? '' }}"
            description="{{ $file->description ?? ''}}"
        >
        @if ($file->caption)
            <caption>
                {{ $file->caption }}
            </caption>
        @endif
    </picture>
</div>
