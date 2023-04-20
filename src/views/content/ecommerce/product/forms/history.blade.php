<x-aui::layout.card class="mt-4">
    <v-tabs vertical class="text-left" >
        <v-tab>Stock History</v-tab>
        <v-tab-item>
            <x-aui-stockhistory :productId="$data->id" />
        </v-tab-item>
        {{-- The override section --}}
        {{ Hooks::action('productUpdate', compact('data')) }}
    </v-tabs>
</x-aui::layout.card>
