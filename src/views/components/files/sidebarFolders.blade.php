<div class="row">
    <div class="col-sm-8">
        <h1>Media Folders</h1>
    </div>
    <div class="col-sm-4 text-right">
        <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#addFolderModal">
            Create
        </button>
    </div>
</div>

@foreach($folders->chunk(3) as $chunk)
<div class="card-deck mb-1">
    @foreach ($chunk as $folder)
        <div class="col-6 col-sm-6 col-md-4 col-lg-4">
            <div class="card text-center media-sidebar-folder-load h-100 mt-1" data-id="{{ $folder->id }}">
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
@endforeach
