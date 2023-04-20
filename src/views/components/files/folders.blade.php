<div class="row">
    <div class="col-sm-8">
        <h1>{{ __('adminui.media') }}</h1>
    </div>
    <div class="col-sm-4 text-right">
        <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#addModal">
            {{ __('adminui.create_new') }}
        </button>
    </div>
</div>


<div class="card-deck">
    @foreach ($folders as $folder)
        <div class="col-12 col-sm-6 col-md-3 col-lg-2 mb-2">
            <div class="card text-center media-folder-load h-100" data-id="{{ $folder->id }}">
                <div class="card-body">
                    <i class="fas fa-folder fa-2x"></i>
                    <h5 class="card-title">{{ $folder->name }}</h5>
                </div>
                <div class="card-footer">
                  <small class="text-muted">{{ $folder->media->count() }} items</small>
                </div>
            </div>
        </div>
    @endforeach
</div>


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="AddModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <legend>{{ __('adminui.create_new') }} {{ __('adminui.media') }} Folder</legend>

                <x-aui::forms.form action="{{  ']) !!}
                    {!! Form::auiText('name', old('name'), [
                            'required' => 'required',
                            'aria-required' => 'true',
                            'id' => 'folder-name'
                        ], __('adminui.name')) !!}

                    <div class="row">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success btn-block" id="add-media-folder">{{ __('adminui.save') }}</button>
                        </div>
                    </div>
                </x-aui::forms.form>
            </div>
        </div>
    </div>
</div>
