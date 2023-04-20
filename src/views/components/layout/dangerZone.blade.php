@if (admin()->can('delete'))

        <x-aui::layout.card title="{{ __('Danger Zone') }}" class="mt-4">
            <v-alert
                color="red"
                text
                class="text-center pt-6 pb-1"
            >
                <strong>DANGER</strong><br/>
                <p>
                {!! $message ?? 'If you delete this, it is not recoverable.<br/>
                Please proceed with caution.' !!}
                </p>
            </v-alert>
            <v-btn
                outlined
                block
                color="error"
                v-on:click="$set(show, 'deleteModal', true)">
                {{ __('adminui.delete') }}
            </v-btn>
        </x-aui::layout.card>
        @if ($method ?? "" == "delete")
            <x-aui::modals.deleteMethodRedirect action="{{ $action ?? '' }}" />
        @else
            <x-aui::modals.deleteRedirect :action="$action ?? ''" />
        @endif

@endif
