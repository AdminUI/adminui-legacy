@php
$dropzoneId = 'upload'.rand(1000, 9999);
@endphp

<input type="hidden" id="chosen-media-folder" value="1" />
<div id="dropzone" class="dropzone">
    <div class="dz-default dz-message">
        <h3>{{ __('adminui.dropzone') }}</h3>
        <p class="text-muted">
            {{ $desc ?? 'Any related files you can upload' }} <br>
            <small>{{ __('adminui.max_size') }} {{ config('media.max_size') }} MB</small>
        </p>
    </div>
</div>

<!-- Dropzone dropzone -->

@push('scripts')
<script>
    // Turn off auto discovery
    Dropzone.autoDiscover = false;

    $(function () {
        // Attach dropzone on element
        var dZone = new Dropzone("#dropzone", {
            url: "{{ route('admin.media.store') }}",
            maxFilesize: {{ isset($maxFileSize) ? $maxFileSize : config('media.max_size') }},
            acceptedFiles: "{!! isset($acceptedFiles) ? $acceptedFiles : config('media.allowed') !!}",
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}
        });
        dZone.on("sending", function(file, xhr, formData) {
                // Will send the filesize along with the file as POST data.
                formData.append("folder_id", $('#chosen-media-folder').val());
        });
    });
</script>
@endpush
