<div class="row">
    <div class="col-sm-8">
        <h1>{{ ucwords($media->name) }} Media Files</h1>
    </div>
    <div class="col-sm-4 text-right">
        <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#addMediaModal">
            Create
        </button>
    </div>
</div>

<div class="card-deck">
    <div class="col-6 col-sm-6 col-md-4 col-lg-4 mb-2">
        <div class="card text-center media-files h-100">
            <div class="card-body">
                <i class="fas fa-folder fa-2x"></i>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-outline-secondary media-sidebar-folder-return">Back</button>
            </div>
        </div>
    </div>
    @foreach ($files as $file)
        <div class="col-6 col-sm-6 col-md-4 col-lg-4 mb-2">
            <div class="card text-center media-files h-100" data-id="{{ $file->id }}">
                <div class="card-img-top">
                    {{-- <x-aui::picture :file="$file" width="200" height="300" class="img-fluid media-lib-img" /> --}}
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-outline-info media-choose-btn" data-media_id="{{ $file->id }}">Choose</button>
                    {{-- <small class="text-muted">
                        {{ $file->name  }}<br/>
                        {{ $file->size }}
                    </small> --}}
                </div>
            </div>
        </div>
    @endforeach
</div>
