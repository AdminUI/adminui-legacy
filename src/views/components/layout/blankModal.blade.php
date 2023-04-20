<v-dialog transition="dialog-bottom-transition" max-width="600">
    <template v-slot:activator="{ on, attrs }">
        @if (isset($button))
            {{$button}}
        @else
            <v-btn color="secondary" outlined rounded v-on="on">
                {{ __('adminui.create_new') }}
            </v-btn>
        @endif
    </template>
    <template v-slot:default="dialog">
        <v-card>
            <v-card-title class="justify-space-between">
                <div>
                    {{ $title ?? 'Please add a title' }}
                </div>
                <v-btn icon small @click="dialog.value = false">
                    <v-icon>mdi-close</v-icon>
                </v-btn>
            </v-card-title>
            <v-card-text>
                {{ $slot ?? '' }}
            </v-card-text>
            {{-- <v-card-actions class="justify-end">
                <v-btn text @click="dialog.value = false">Close</v-btn>
            </v-card-actions> --}}
        </v-card>
    </template>
</v-dialog>
