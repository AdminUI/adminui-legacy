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
        <x-aui::forms.text
            name="slug"
            label="{{ __('slug') }}"
            value="{{ old('slug', $data->slug) }}"
            required />
    </v-col>
</v-row>
{{-- block end --}}
{{-- Block --}}
<v-row class="mt-4">
    <v-col cols="12" class="py-1">
        <x-aui::forms.text
            name="sort_order"
            label="{{ __('adminui.sort_order') }}"
            value="{{ old('sort_order', $data->sort_order) }}"
            required />
    </v-col>
</v-row>
<input type="hidden" name="id" value="{{ $data->id }}" />
{{-- block end --}}
