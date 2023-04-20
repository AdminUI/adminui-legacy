{{-- Vue trigger for media library --}}
<aui-featured-image initial="{{ $data->media->links['medium'] ?? '' }}" :initial-id="{{ $data->media_id ?? 0 }}">
    <template #title>
        {{ $title }}
    </template>
    <template #activator-button>
        Select {{ $title }}
    </template>
</aui-featured-image>
