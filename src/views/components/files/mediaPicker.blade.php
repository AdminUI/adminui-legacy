{{-- Image chooser --}}

    <div class="media-file text-center">
        <img src="{!! AdminUI\AdminUI\Helpers\ImageHelper::imageLink($media) !!}"
            class="img-fluid"
            />
        <br/>
        <div class="mt-4">
            <input type="hidden" name="{{ $name ?? 'media_id[]' }}" class="media_id" value="{{ $media->id ?? 0 }}" />
            <button type="button" class="btn btn-sm btn-info choose-media">{{ __('adminui.choose') }}</button>
            <button type="button" class="btn btn-sm btn-danger remove-media">{{ __('adminui.delete') }}</button>
        </div>
    </div>

