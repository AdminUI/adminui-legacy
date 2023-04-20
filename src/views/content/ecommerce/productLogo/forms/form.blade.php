{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="12" class="my-3">
        <x-aui::layout.mediaPicker :data="$data" title="Logo" />
    </v-col>
    <v-col cols="12" class="">
        <x-aui::forms.text
        name="link"
        label="{{ __('Full Url / External Link') }}"
        value="{{ old('name', $data->link) }}"
        required />
    </v-col>
</v-row>
{{-- block end --}}
