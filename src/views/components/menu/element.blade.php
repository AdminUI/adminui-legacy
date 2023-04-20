@foreach ($drops as $drop)
    @if (empty($drop->parent()->count()))
        <div data-id="{{ $drop->id }}" data-parent-id="{{ $drop->parent_id }}" data-level="{{ $level }}"
            class="page-container" style="--level: {{ $level }}" draggable="true">
            <div class="page-link">
                <div class="d-flex justify-space-between align-center">
                    <a href="{{ route($editroute, short_encrypt($drop->id)) }}">
                        <small>[id: {{ $drop->id }}]</small> {{ $drop->$displayfield }}
                    </a>

                    <v-btn text small rounded icon href="{{ route($editroute, short_encrypt($drop->id)) }}" text-right
                        class="align-center">
                        <v-icon color="info" small>mdi-pencil</v-icon>
                    </v-btn>
                </div>
            </div>
        </div>
    @else
        <div data-id="{{ $drop->id }}" data-parent-id="{{ $drop->parent_id }}" data-level="{{ $level }}"
            style="--level: {{ $level }}" class="page-container page-has-children" draggable="true">
            <div class="page-link">
                <div class="page-children-trigger">
                    <div class="page-children-trigger-inner"></div>
                </div>

                <div class="d-flex justify-space-between align-center">
                    <a href="{{ route($editroute, short_encrypt($drop->id)) }}">
                        <small>[id: {{ $drop->id }}]</small> {{ $drop->$displayfield }}
                    </a>

                    <v-btn text small rounded icon href="{{ route($editroute, short_encrypt($drop->id)) }}" text-right
                        class="align-center">
                        <v-icon color="info" small>mdi-pencil</v-icon>
                    </v-btn>
                </div>
            </div>
            <div class="page-children">
                <x-aui::menu.element :editroute="$editroute" :displayfield="$displayfield" :drops="$drop
                    ->parent()
                    ->orderBy('sort_order', 'asc')
                    ->get()" :level="$level + 1" />
            </div>
        </div>
    @endif
@endforeach
