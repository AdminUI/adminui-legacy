<v-row>
    <v-col cols="12">
        <aui-drag-and-drop new-parent-route="{{ $sendAjaxNewParent }}" new-order-route="{{ $sendAjaxNewOrder }}">
            <x-aui::menu.element :editroute="$editroute ?? ''" :displayfield="$displayfield" :drops="$drops" :level="1" />
        </aui-drag-and-drop>
    </v-col>
</v-row>

@push('scripts')
    <script></script>
@endpush
