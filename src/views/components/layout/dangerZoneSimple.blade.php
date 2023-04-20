@if (admin()->can('delete'))

        <v-btn
            outlined
            block
            color="error"
            v-on:click="$set(show, 'deleteModal', true)">
            {{ $buttonName ?? __('adminui.delete') }}
        </v-btn>
        @if ($method ?? "" == "delete")
            <x-aui::modals.deleteMethodRedirect action="{{ $action ?? '' }}" />
        @else
            <x-aui::modals.deleteRedirect :action="$action ?? ''" />
        @endif

@endif
