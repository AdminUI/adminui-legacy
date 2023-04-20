
    <x-aui::layout.card title="{{ __('Duplicate') }}" class="mt-4">
        <v-alert
            color="primary"
            text
            class="text-center pt-6 pb-1"
        >
            <strong>Information</strong><br/>
            <p>
                This will duplicate this item
            </p>
        </v-alert>
        <v-btn
            block
            color="info"
            href="{{ $action }}">
            {{ __('Duplicate') }}
        </v-btn>
    </x-aui::layout.card>
