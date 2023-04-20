<x-aui::layout.card title="{{ $title ?? 'Featured Image' }}" class="mt-4">

    @if (!empty($data))
        {{-- Vue trigger for media library --}}
        <aui-featured-image-header initial="{{ optional($data->header)->links['medium'] ?? '' }}"
            :initial-id="{{ $data->header_media_id ?? 0 }}">
    @endif
    <template #title>
        {{ $title }}
    </template>
    <template #activator-button>
        Select {{ $title }}
    </template>
    </aui-featured-image-header>

    {{ $slot }}

</x-aui::layout.card>
