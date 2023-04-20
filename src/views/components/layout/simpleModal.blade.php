<v-dialog max-width="600" v-model="show.{{ $id ?? 'modal' }}">
    <template #activator="{ on }">
        <v-btn color="{{ $color ??  'success'}}" v-on="on">
            {{ $name ?? 'Modal Name' }}
        </v-btn>
    </template>
    <v-card>
        <v-card-title class="justify-space-between">
            <div>
                {{ $title ?? 'Please add a title' }}
            </div>
            <v-btn icon small v-on:click="show.{{ $id ?? 'modal' }} = false">
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-card-title>
        <v-card-text>
            <x-aui::forms.form action="{{ $action }}">

                {!! $slot !!}

                <x-aui::forms.modalSave />
            </x-aui::forms.form>
        </v-card-text>
    </v-card>
</v-dialog>
