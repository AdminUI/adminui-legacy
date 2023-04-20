{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="code"
            label="{{ __('adminui.code') }}"
            value="{{ old('code', $data->code) }}"
            required />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="description"
            label="{{ __('adminui.description') }}"
            value="{{ old('description', $data->description) }}"
            required />
    </v-col>
</v-row>
{{-- block end --}}
{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="6" class="py-1">
        <x-aui::forms.number
            name="amount"
            label="{{ __('adminui.amount') }}"
            value="{{ old('amount', $data->amount) }}"
            required />
    </v-col>
    <v-col cols="6" class="py-1">
        @php
            $type = [1 => 'total', 2 => 'percentage'];
        @endphp
        <x-aui::forms.select
            :options="collect($type)"
            name="amount_type"
            label="{{ __('adminui.amount_type') }}"
            :value="$data->amount_type" />
    </v-col>
</v-row>
{{-- block end --}}
{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="12" class="py-1">
        <x-aui::forms.number
            name="use_limit"
            label="{{ __('adminui.use_limit') }}"
            value="{{ old('use_limit', $data->use_limit) }}"
            required />
    </v-col>
</v-row>
{{-- block end --}}
{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="6" class="py-1">
        <x-aui::forms.date
            name="valid_from"
            :label="__('adminui.valid_from')"
            :value="$data->valid_from" />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.date
            name="valid_to"
            :label="__('adminui.valid_to')"
            :value="$data->valid_to" />
    </v-col>
</v-row>
{{-- block end --}}
