{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="name"
            label="{{ __('adminui.name') }}"
            value="{{ old('name', $data->name) }}"
            required />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.number
        name="postage_size"
        label="{{ __('adminui.postage_size') }}"
        value="{{ old('name', $data->postage_size) }}"
        required />
    </v-col>
</v-row>
{{-- block end --}}
{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="cutoff"
            label="{{ __('adminui.cutoff') }}"
            value="{{ old('cutoff', $data->cutoff) }}"
            required />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
        name="standard"
        label="{{ __('adminui.standard') }}"
        value="{{ old('name', $data->standard) }}"
        required />
    </v-col>
</v-row>
{{-- block end --}}
{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
            name="nextday"
            label="{{ __('adminui.nextday') }}"
            value="{{ old('nextday', $data->nextday) }}"
            required />
    </v-col>
    <v-col cols="6" class="py-1">
        <x-aui::forms.text
        name="saturday"
        label="{{ __('adminui.saturday') }}"
        value="{{ old('name', $data->saturday) }}"
        required />
    </v-col>
</v-row>
{{-- block end --}}
