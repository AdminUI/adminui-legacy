<x-aui::layout.card title="{{ $title ?? 'Featured Image' }}" class="mt-4">

    @if (!empty($data))
        {{-- Vue trigger for media library --}}
        <aui-featured-image initial="{{ optional($data->media)->links['medium'] ?? '' }}"
            :initial-id="{{ $data->media_id ?? 0 }}">
            <template #title>
                {{ $title }} hello
            </template>
            <template v-slot:activator-button>
                {{ $title ?? 'Featured Image' }}
            </template>
        </aui-featured-image>
    @else
        <aui-featured-image initial="{{ '' }}" :initial-id="{{ $data->media_id ?? 0 }}">
            <template #title>
                {{ $title }} hello
            </template>
            <template v-slot:activator-button>
                {{ $title ?? 'Featured Image' }}
            </template>
        </aui-featured-image>
    @endif

    {{ $slot }}

</x-aui::layout.card>
