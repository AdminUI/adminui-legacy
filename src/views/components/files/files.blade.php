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
    <div class="col-12 col-sm-6 col-lg-3 col-xl-2 mb-2">
        <div class="card text-center media-files h-100">
            <div class="card-body">
                <i class="fas fa-folder-open fa-2x"></i>
            </div>
            <div class="card-footer">
              <button class="btn btn-sm btn-outline-secondary media-folder-return">Back</button>
            </div>
        </div>
    </div>
    @foreach ($files as $file)
        <div class="col-12 col-sm-6 col-lg-3 col-xl-2 mb-2 delete-media">
            <div class="card text-center media-files h-100" data-id="{{ $file->id }}">
                <div class="card-img-top" data-content="hi">
                    {{-- <x-aui::picture :file="$file" width="200" height="300" class="img-fluid media-lib-img" /> --}}
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col mb-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-block btn-sm btn-outline-info" data-toggle="modal" data-target="#media{{ $file->id }}">
                              Details
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="media{{ $file->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Details {{$file->name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">

                                    {{-- <x-aui::picture :file="$file" width="200" height="300" class="img-fluid media-lib-img" /> --}}

                                    <form action="/admin/media/update/{{ $file->id }}" method="POST" >
                                            @csrf
                                            <label for="title">Title:</label><br>
                                            <input type="text" id="title" name="title" value="{{ $file->title }}"><br>

                                            <label for="alt">Alt:</label><br>
                                            <input type="text" id="alt" name="alt" value="{{ $file->alt }}"><br>

                                            <label for="description">Description:</label><br>
                                            <input type="text" id="description" name="description" value="{{ $file->description }}"><br>

                                            <label for="caption">Caption:</label><br>
                                            <input type="text" id="caption" name="caption" value="{{ $file->caption }}"><br><br>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </form>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col">
                            @if (admin()->can('delete'))
                                <button class="btn btn-block btn-sm btn-outline-danger confirm-delete" data-id="{{ $file->id }}" data-table="media" data-block=".delete-media">Delete</button>
                            @endif
                        </div>
                    </div>

                    {{-- <small class="text-muted">
                        {{ $file->name  }}<br/>
                        {{ $file->size }}
                    </small> --}}
                </div>
            </div>
        </div>
    @endforeach
</div>
