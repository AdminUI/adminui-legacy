<v-dialog max-width="600" v-model="show.create">
    <template #activator="{ on }">
        <v-btn color="secondary" outlined rounded v-on="on">
            {{ $buttonText ?? __('adminui.create_new') }}
        </v-btn>
    </template>
    <v-card>
        <v-card-title class="justify-space-between">
            <div>
                {{ __('adminui.create_new') }}
            </div>
            <v-btn icon small v-on:click="show.create = false">
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
