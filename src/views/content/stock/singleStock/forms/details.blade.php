{{-- Block --}}
<v-row class="mt-4">
    {{-- <v-col cols="12" class="py-1">
        <v-col cols="12" class="py-1">
            <x-aui::forms.chips
                :options='$supplier'
                name="supplier"
                :label="__('auistock.supplier')"
                :value="''"
            />
        </v-col>
    </v-col> --}}
    <v-col cols="12" class="py-1">
        <v-col cols="12" class="py-1">

            <x-aui::forms.number
                name="new_quantity"
                label="New Quantity"
                value="{{ old('new_quantity', $data->quantity) }}"
            />
        </v-col>
    </v-col>
    {{-- <v-col cols="12" class="py-1">
        <v-col cols="12" class="py-1">
            @php
                $action = collect([
                    'remove' => 'Remove',
                    'add'    => 'Add',
                    'update' => 'Update',
                ]);
            @endphp
            <x-aui::forms.select
                :options="$action"
                name="action"
                label="{{ __('auistock.action') }}"
                :value="$data->action"
            />
        </v-col>
    </v-col> --}}
    <v-col cols="12" class="py-1">
        <v-col cols="12" class="py-1">
            <x-aui::forms.textarea
                name="notes"
                label="{{ __('auistock.notes') }}"
                value="{{ old('notes', $data->notes) }}"
            />
        </v-col>
    </v-col>
</v-row>
{{-- block end --}}
