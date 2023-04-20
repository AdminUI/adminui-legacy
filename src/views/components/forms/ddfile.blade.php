<fieldset class="mb-2">{{ $label ?? $name }}</fieldset>
<div class="row">
    <div class="col-md-6 col-sm-12">
        <input id="input-id" name="{{ $name }}" type="file" class="file file-upload" data-preview-file-type="text" >
    </div>
    @if ($value)
        <div class="col-md-4">
            <label class="form-control-label">{{ __('adminui.current_image') }}</label><br/>
            <div class="text-center">
                <img src="{{ isset($path) ? asset($path.$value) : asset('uploads/images/'.($value ?? 'no_image.png')) }}" class="img-thumbnail">
            </div>
        </div>
    @endif
</div>
