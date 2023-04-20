<v-card class="{{ $class ?? '' }}">
    @if (isset($title))
        <v-toolbar color="toolbar" class="text--white" dense :flat="$themeOptions.toolbarFlat">
            <div :class="{
                'white--text': $themeOptions.darkToolbarText
            }">{{ $title }}</div>
        </v-toolbar>
    @endif
    <v-card-text class="pt-2">
        {{ $slot }}
    </v-card-text>
</v-card>
